@extends('layouts.app')

@section('content')

<br><br><br><br>
<div class="container">
<table class="container">
    <thead>
    <hr>
    <tr>
        <th>Employee Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Title</th>
        <th>Manager Id</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <hr>
    </tr>
<?php
foreach ($employees as $row) {

$result = (array) json_decode(json_encode($row),true);//This is the gold key to atlantis. aka it allows overrides true on the json

?>
<tr>
<?php
foreach ( $row as $key => $employee) {

?>
    <td class="links"><a href="display/{{$employee}}">{{$employee}}</a></td>
<?php }} ?>
</tr>
</tbody>
</table>
</div>
@endsection