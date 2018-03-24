var app = angular.module('delegateApp',[]);
app.controller('delegateCntrl', function ($scope, $http,$templateCache) 
{
  $scope.dgtAdd = function()
  {
  	 var method = 'POST';
  	 var url = 'delegate-insert';
    data = {

       dgt_clb_id: $scope.dgt_clb_id, 
       dgt_bdg_name: $scope.dgt_bdg_name,
       prs_name: $scope.prs_name, 
       prs_mob: $scope.prs_mob,
       prs_email: $scope.prs_email,
       dgt_cat_id: $scope.dgt_cat_id,
       dgt_prs_id: $scope.dgt_prs_id,
       prs_password: $scope.prs_password
       },
       console.log(data);
  	// $http.post('delegate-insert',{
  	//    // 'dgt_clb_id': $scope.dgt_clb_id, 
   //    //  'dgt_bdg_name': $scope.dgt_bdg_name,
   //    //  'prs_name': $scope.prs_name, 
   //    //  'prs_mob': $scope.prs_mob,
   //    //  'prs_email': $scope.prs_email,
   //    //  'dgt_cat_id': $scope.dgt_cat_id,
   //    //  'dgt_prs_id': $scope.dgt_prs_id,
   //    //  'prs_password': $scope.prs_password
  	// }).

  	  $http({
      method: method,
      url: url,
      data: $.param({'data' : data}),
      headers: {'Content-Type': 'application/json; charset=utf-8'},
      cache: $templateCache
    }).success(function(data,status,header,config)
  	{
  		console.log('insert success');
  	});
  }
});
  	