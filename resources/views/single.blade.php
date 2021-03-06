@extends('layouts.app')

                @section('content')
                    <div class="flex-center position-ref full-height">
                        <div class="content">
                            <div class="title m-b-md">
                                {{ config('app.long.name', 'Laravel Csv Magic Parser') }}
                            </div>
                            <br>

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
                                foreach ($employee as $row) {
                                $result = (array) json_decode(json_encode($row),true);//This is the gold key to atlantis. aka it allows overrides true on the json
                                ?>
                                <tr>
                                    <?php
                                    foreach ( $row as $key => $employee) {

                                    ?>
                                    <td class="links"><a href="{{$employee}}">{{$employee}}</a></td>
                                    <?php }} ?>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endsection