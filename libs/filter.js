//FILTER
app.filter('unsafe', function($sce){
    return function(val) {
        return $sce.trustAsHtml(val);
    };
});

app.filter('nospace', function (){
    return function (value) {
        return (!value) ? '' : value.replace(/ /g, '');
    };
});

app.filter('twoDecimal', function(){
  return function (n) {
    return n.toFixed(2);
  };
});

app.filter('capitalize', function() {
  return function(input, scope) {
    if (input!=null)
    input = input.toLowerCase();
    return input.substring(0,1).toUpperCase()+input.substring(1);
  };
});

app.filter('date', function (){
	return function (value){
		return value.substr(0, 10).replace(/-/g, '/');
	};
});
app.filter('substr', function (){
	return function (value){
		return value.substr(0, 6).replace(/[A-Za-z0-9]/g, '*');
	};
});