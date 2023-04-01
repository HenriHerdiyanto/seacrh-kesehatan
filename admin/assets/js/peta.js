
		var map = L.map('map').setView([-7.803249,110.3398253], 13);

		var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
		}).addTo(map);

		var marker = L.marker([-7.803249,110.3398253]).addTo(map)
		.bindPopup('<b>Nama Lokasi</b><br />Titik Lokasi.').openPopup();


		function onMapClick(e) {
			popup
			.setLatLng(e.latlng)
			.setContent(`You clicked the map at ${e.latlng.toString()}`)
			.openOn(map);
		}

		map.on('click', onMapClick);
