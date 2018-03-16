var app = angular.module("Tienda", []);

app.controller("Mostrarproductos", function ($scope,$http) {
	// body...
	$http.get("http://localhost/Tiendaonline/producto/json").then(function (response) {
		// body...
		$scope.productos = response.data.data;
		//alert(data);
	});
});