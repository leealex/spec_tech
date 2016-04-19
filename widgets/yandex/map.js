DG.then(function () {
    var map, point, latLang, marker, container, zoom, address, text, popup;

    container = $('#gis-map');
    zoom = container.data('zoom');
    address = container.data('address');
    text = container.data('text');
    map = DG.map('gis-map', {
        center: [54.9802, 82.8980],
        zoom: zoom,
        scrollWheelZoom: false
    });

    DG.ajax({
        url: 'http://catalog.api.2gis.ru/geo/search',
        data: {
            key: 'ruczoy1743',
            version: 1.3,
            q: address
        },
        type: 'GET',
        success: function (data) {
            if (typeof marker !== 'undefined') {
                map.removeLayer(marker);
            }
            point = DG.Wkt.toPoints(data.result[0].centroid);
            latLang = [point[1], point[0]];
            marker = DG.marker(latLang);
            popup = DG.popup()
                .setLatLng(latLang)
                .setContent(text);

            marker.addTo(map).bindPopup(popup);
            map.panTo(latLang);
        },
        error: function (error) {
            console.log(error);
        }
    });
});
