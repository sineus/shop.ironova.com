//USER CSS FOR CERTAINS ROUTE PAGE
app.directive('classRoute', function ($rootScope, $route){

    return function (scope, elem, attr){

        var previous = '';
        
        $rootScope.$on('$routeChangeSuccess', function (event, currentRoute){
            
            var route = currentRoute.$$route;
        
            if(route){

                var cls = route['pageClass'];

                if(previous){
                    
                    attr.$removeClass(previous);

                }

                if(cls) {
                    
                    previous = cls;
                    attr.$addClass(cls);

                }
            }
        });
    };

});
//WATCH IS VALUE OF INPUT IS EQUAL A OTHER VALUE
app.directive('nxEqual', function() {
    return {
        require: 'ngModel',
        link: function (scope, elem, attrs, model) {
            if (!attrs.nxEqual) {
                console.error('nxEqual expects a model as an argument!');
                return;
            }
            scope.$watch(attrs.nxEqual, function (value) {
                model.$setValidity('nxEqual', value === model.$viewValue);
            });
            model.$parsers.push(function (value) {
                var isValid = value === scope.$eval(attrs.nxEqual);
                model.$setValidity('nxEqual', isValid);
                return isValid ? value : undefined;
            });
        }
    };
});