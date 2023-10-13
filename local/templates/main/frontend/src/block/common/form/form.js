import IMask from 'imask';

document.addEventListener("DOMContentLoaded", function(){
	const phone = document.querySelector('#phone-mask');
	const phone2 = document.querySelector('#phone-mask');
	const email = document.querySelector('#email');
	const question = document.querySelector("#text");
	const btn = document.querySelector("#btn");
	const name = document.querySelector("#name");
	const msg = document.querySelector("#msg");
	const form = document.querySelector('#form');

	if (phone != null && email != null && question != null && btn != null && name != null && msg != null) {
		IMask(
			phone,
			{
				mask: '+{7}(000)000-00-00',
				lazy: false,
				placeholderChar: '_'
			}
		)

		form.addEventListener("submit", function(event){
			let error = false;
			msg.textContent = "";

			if (name.value == ""){
				addLink("Значение поля Имя не может быть пустым", msg);
				error = true;
			}

			if (email.value == "" && phone2.value.includes("_")){
				addLink("Почта или номер телефона должны быть введены правильно", msg);
				error = true;
			}

			if (question.value.length < 5){
				addLink("Недопустимая длина вопроса", msg);
				error = true;
			}

			if (error) {
				event.preventDefault();
			}
		});
	}

	function addLink(input, msg){
		let li = document.createElement("li");
		li.innerHTML = input;
		msg.appendChild(li);
	}
});
