<!-- @extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.UserMenu')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section id="widgets-Statistics">
                    <div class="row">
                        <div class="col-12 mt-1 mb-2">
                            <h4>Edit Profile</h4>
                            <hr>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Pssword</th>
                                <th>Confirm Password</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th> </th>
                            
                            </tr>
                          
                        </table>
                </section>
            </div>
        </div>
        </div>
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('Layout.footer')

    @include('Layout.scripts')
</body>

<!-- modal -->
<div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control input-sm" type="text" name="edited_name">
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input class="form-control input-sm" type="text" name="edited_username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control input-sm" type="text" name="edited_password">
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input class="form-control input-sm" type="text" name="edited_ConfirmPassword">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input class="form-control input-sm" type="email" name="edited_email">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input class="form-control input-sm" type="text" name="edited_phone">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary btnSave"
                            onClick="store()">Save
                    </button>
                    <button type="button" class="btn btn-primary btnUpdate"
                            onClick="update()">Update
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->







@endsection


    


    <script>
        var adminUrl = '/user/editProfile';
        var _modal = $('#modal');
        var btnSave = $('.btnSave');
        var btnUpdate = $('.btnUpdate');
        $.ajaxSetup({
            headers: {'X-CSRF-Token': @csrf}
        });
        function getRecords() {
            $.get(adminUrl + '/contacts/data')
                .success(function (data) {
                    var html='';
                    data.forEach(function(row){
                        html += '<tr>'
                        html += '<td>' + row.id + '</td>'
                        html += '<td>' + row.name + '</td>'
                        html += '<td>' + row.email + '</td>'
                        html += '<td>' + row.phone + '</td>'
                        html += '<td>'
                        html += '<button type="button" class="btn btn-xs btn-warning btnEdit" title="Edit Record" >Edit</button>'
                        html += '<button type="button" class="btn btn-xs btn-danger btnDelete" data-id="' + row.id + '" title="Delete Record">Delete</button>'
                        html += '</td> </tr>';
                    })
                    $('table tbody').html(html)
                })
        }
        getRecords()
        function reset() {
            _modal.find('input').each(function () {
                $(this).val(null)
            })
        }
        function getInputs() {
            var id = $('input[name="id"]').val()
            var name = $('input[name="name"]').val()
            var email = $('input[name="email"]').val()
            var phone = $('input[name="phone"]').val()
            return {id: id, name: name, email: email, phone: phone}
        }
        function create() {
            _modal.find('.modal-title').text('New Contact');
            reset();
            _modal.modal('show')
            btnSave.show()
            btnUpdate.hide()
        }
        function store(){
            if(!confirm('Are you sure?')) return;
            $.ajax({
                method: 'POST',
                url: adminUrl + '/contacts/store',
                data: getInputs(),
                dataType: 'JSON',
                success: function () {
                    console.log('inserted')
                    reset()
                    _modal.modal('hide')
                    getRecords();
                }
            })
        }
        $('table').on('click', '.btnEdit', function () {
            _modal.find('.modal-title').text('Edit Contact')
            _modal.modal('show')
            btnSave.hide()
            btnUpdate.show()
            var id = $(this).parent().parent().find('td').eq(0).text()
            var name = $(this).parent().parent().find('td').eq(1).text()
            var email = $(this).parent().parent().find('td').eq(2).text()
            var phone = $(this).parent().parent().find('td').eq(3).text()
            $('input[name="id"]').val(id)
            $('input[name="name"]').val(name)
            $('input[name="email"]').val(email)
            $('input[name="phone"]').val(phone)
        })
        function update(){
            if(!confirm('Are you sure?')) return;
            $.ajax({
                method: 'POST',
                url: adminUrl + '/contacts/update',
                data: getInputs(),
                dataType: 'JSON',
                success: function () {
                    console.log('updated')
                    reset()
                    _modal.modal('hide')
                    getRecords();
                }
            })
        }
        $('table').on('click', '.btnDelete', function () {
            if(!confirm('Are you sure?')) return;
            var id = $(this).data('id');
            var data={id:id}
            $.ajax({
                method: 'POST',
                url: adminUrl + '/contacts/delete',
                data:data,
                dataType: 'JSON',
                success: function () {
                    console.log('deleted');
                    getRecords();
                }
            })
        })
    </script>

@endsection -->