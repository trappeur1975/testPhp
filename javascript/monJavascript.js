class LinkedSelect{

	// select et un element select du html
	constructor(select) {
		this.select = select;
		this.target = document.querySelector(this.select.dataset.target);
		this.placeholder = this.target.firstElementChild;
		this.onChange = this.onChange.bind(this);
		this.select.addEventListener('change', this.onChange);
	}

	onChange(e){
		//on recupere les donnees en ajax
		let request = new XMLHttpRequest();
		
		request.open('GET', '.'+ this.select.dataset.source.replace('$id', e.target.value), true);
		// request.open('GET', './listFood.php?type=food&filter=3', true)
		
		request.onload = () => {
			if(request.status >= 200 && request.status < 400){
				let data = JSON.parse(request.responseText);
				let options = data.reduce(function(acc, option){
					return acc + '<option value="' + option.value + '">' +  option.label + '</option>';
				}, '')
				// let target = document.querySelector(this.select.dataset.target)
				this.target.innerHTML = options;
				this.target.insertBefore(this.placeholder, this.target.firstChild);
				this.target.selectedIndex = 0;
				this.target.style.display =  null;
			} else {
				alert('impossible de charger la liste');
			}
		}
		
		request.onerror = function () {
			alert('impossible de charger la liste');
		}
		
		request.send()

		//on inject les données dans le prochain select
	}
}

let selects = document.querySelectorAll('.linked-select');

selects.forEach(function (select){
	new LinkedSelect(select);
})