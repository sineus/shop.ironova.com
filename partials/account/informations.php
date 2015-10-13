<!--ACCOUNT / INFORMATION-->
<div class="col-sm-12 order-section info-section">
	<h4>Your ID</h4>
    <div class="table-responsive">
    	<table class="table table-curved">
            <tbody>
                <tr ng-click="editAccount('email', info.mail, 'Mail', 'mail')">
                	<td class="title">Email address</td>
                	<td>{{info.mail}}</td>
                	<td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>	
                </tr>
                <tr ng-click="editAccount('pass', info.psw, 'Password', 'password')">
                	<td class="title">Password</td>
                	<td>{{info.psw | substr}}</td>
                	<td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>	
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-sm-6 order-section info-section">
    <h4>Informations</h4>
    <div class="table-responsive">
        <table class="table table-curved">
            <tbody>
                <tr ng-click="editAccount('civilite', info.title, 'Title', 'text')">
                    <td class="title">Title</td>
                    <td>{{info.title}}</td>
                    <td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>   
                </tr>
                <tr ng-click="editAccount('nom', info.last_name, 'Last name', 'text')">
                    <td class="title">Last name</td>
                    <td>{{info.last_name}}</td>
                    <td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>   
                </tr>
                <tr ng-click="editAccount('prenom', info.prenom, 'First name', 'text')">
                    <td class="title">First name</td>
                    <td>{{info.first_name}}</td>
                    <td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>   
                </tr>
                <tr ng-click="editAccount('date_naiss', info.birthdate, 'Birthday', 'date')">
                    <td class="title">Birthday</td>
                    <td>{{info.birthdate | date}}</td>
                    <td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>   
                </tr>
                <tr ng-click="editAccount('poids', info.weight, 'Weight', 'text')">
                    <td class="title">Weight</td>
                    <td>{{info.weight}} kg</td>
                    <td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>   
                </tr>
                <tr ng-click="editAccount('taille', info.height, 'Height', 'text')">
                    <td class="title">Height</td>
                    <td>{{info.height}} cm</td>
                    <td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>   
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="col-sm-6 order-section info-section">
	<h4>Delivery address</h4>
    <div class="table-responsive">
    	<table class="table table-curved">
            <tbody>
                <tr>
                	<td class="title">Full name</td>
                	<td>{{info.title}} {{info.last_name}} {{info.first_name}}</td>
                	<td class="edit">
                        <button class="send-btn disabled"><span class="glyphicon glyphicon-pencil"></span> Edit</button>   
                    </td>	
                </tr>
                <tr ng-click="editAccount('adresse1', info.address, 'Address', 'text')">
                	<td class="title">Address</td>
                	<td>{{info.address}}</td>
                	<td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>	
                </tr>
                <tr ng-click="editAccount('ville', info.city, 'City', 'text')">
                	<td class="title">City</td>
                	<td>{{info.city}}</td>
                	<td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>	
                </tr ng-click="editAccount('cp', info.zip, 'Zip', 'text')">
                	<td class="title">ZIP code</td>
                	<td>{{info.zip}}</td>
                	<td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>	
                </tr>
                <tr ng-click="editAccount('rid_pays', info.country, 'Country', 'text')">
                	<td class="title">Country</td>
                	<td>{{info.country}}</td>
                	<td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>	
                </tr>
                <tr ng-click="editAccount('tel', info.phone, 'Phone', 'tel')">
                	<td class="title">Phone</td>
                	<td>{{info.phone}}</td>
                	<td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>	
                </tr>
                <tr ng-click="editAccount('portable', info.mobile, 'Mobile', 'tel')">
                	<td class="title">Mobile</td>
                	<td>{{info.mobile}}</td>
                	<td class="edit">
                        <button class="send-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    </td>	
                </tr>
            </tbody>
        </table>
    </div>
</div>