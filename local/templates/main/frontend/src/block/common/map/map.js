document.addEventListener("DOMContentLoaded", function(){
	const officeTulaYandexMap = document.querySelector("#officeTulaYandexMap");
	const officeMoscowYandexMap = document.querySelector("#officeMoscowYandexMap");

	const tulabtn = document.querySelector("#tulabtn");
	const moscowbtn = document.querySelector("#moscowbtn");
	const tulaMap = document.querySelector("#tulaMap");
	const moscowMap = document.querySelector("#moscowMap");

	const ymaps = window.ymaps;

	if ((typeof ymaps != "undefined" && officeTulaYandexMap != null && officeMoscowYandexMap != null) == true) {
		tulabtn.className += " b-map__selectorbtn--active";
		moscowMap.className += " b-map__content--hidden";
		ymaps.ready(function(){
			let tulaMapOffice = new ymaps.Map("officeTulaYandexMap", {
				center: [54.200802, 37.584685],
				zoom: 16
			});

			let myTulaPlacemark = new ymaps.Placemark(tulaMapOffice.getCenter(), {
				hintContent: 'Офис Текарт',
				balloonContent: 'г. Тула, ул. Ф. Смирнова ул., д. 28 Тел. / Факс: (4872) 250-450, 57-05-01'
			});

			tulaMapOffice.geoObjects.add(myTulaPlacemark);

			tulabtn.addEventListener("click", function(){
				tulaMap.classList.remove("b-map__content--hidden");
				moscowMap.className += " b-map__content--hidden";
				officeTulaYandexMap.innerHTML = '';
				officeMoscowYandexMap.innerHTML = '';

				let tulaMapOffice = new ymaps.Map("officeTulaYandexMap", {
					center: [54.200802, 37.584685],
					zoom: 16
				});

				let myTulaPlacemark = new ymaps.Placemark(tulaMapOffice.getCenter(), {
					hintContent: 'Офис Текарт',
					balloonContent: 'г. Тула, ул. Ф. Смирнова ул., д. 28 Тел. / Факс: (4872) 250-450, 57-05-01'
				});

				tulaMapOffice.geoObjects.add(myTulaPlacemark);

				moscowbtn.classList.remove('b-map__selectorbtn--active');
				tulabtn.classList.remove('b-map__selectorbtn--active');
				this.className += " b-map__selectorbtn--active";
			});

			moscowbtn.addEventListener("click", function(){
				moscowMap.classList.remove("b-map__content--hidden");
				tulaMap.className += " b-map__content--hidden";
				officeTulaYandexMap.innerHTML = '';
				officeMoscowYandexMap.innerHTML = '';

				let moscowMapOffice = new ymaps.Map("officeMoscowYandexMap", {
					center: [55.679138, 37.630131],
					zoom: 16
				});

				let myMoscowPlacemark = new ymaps.Placemark(moscowMapOffice.getCenter(), {
					hintContent: 'Офис Текарт',
					balloonContent: 'г. Москва, Варшавское шоссе, д. 47, к. 4, оф. 1224 (12 этаж) Тел. / Факс: (495) 933-62-10'
				});

				moscowMapOffice.geoObjects.add(myMoscowPlacemark);

				moscowbtn.classList.remove('b-map__selectorbtn--active');
				tulabtn.classList.remove('b-map__selectorbtn--active');
				this.className += " b-map__selectorbtn--active";
			});
		});
	}
});