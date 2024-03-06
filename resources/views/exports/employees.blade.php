<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Address</th>
            <th>Mobile No</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->emp_code }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->officeDetail->designation }}</td>
            <td>{{ $employee->officeDetail->office_address }}</td>
            <td>{{ $employee->officeDetail->office_mobile_no }}</td>
        </tr>
        @endforeach
    </tbody>
</table>