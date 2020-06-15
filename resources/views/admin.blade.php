<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin| product</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/fontawesome-free/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('navbar')
  @include('menubar')

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tours</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
    <div class="modal" id="addProductModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="admin/add" method="post">
                    @csrf
                <div class="modal-header">
                  <h4 class="modal-title">Add tour</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="container">
                      <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="">Tour's name:</label>
                                <input type="text" required class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
                             </div>
                              <div class="form-group">
                                    <label for="">Type tour:</label>
                                    <input type="text" required class="form-control" name="typetour" id="typetour" aria-describedby="helpId" placeholder="">
                              </div>
                              <div class="form-group">
                                <label for="">Schedule:</label>
                                <input type="text" required class="form-control" name="schedule" id="schedule" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="depart">Depart:</label>
                                <input type="date" required name="depart" id="depart">
                            </div>
                            <div class="form-group">
                                <label for="">Number people</label>
                                <input type="number" min="1" required class="form-control" name="numberPeople" id="numberPeople" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Price:</label>
                                <input type="number" required class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="">
                              </div>
                            <label for="">Images</label>
                            <div class="input-group">
                                <div class="custom-file" >
                                <input type="file" name="uploadImage"  id="uploadImage" value="" class="custom-file-input" >
                                <input type="number" hidden id="quantityImg" value="0">
                                <input type="text" name="image" id="image" value="" hidden>
                                <label class="input-group-text" type="button" for="uploadImage">Choose file</label>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="row" id="preImg">

                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">add</button>
                </div>
                </form>
              </div>
            </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                 <!--else of check option-->
            <div class="card">
              <div class="card-header">
                  Show 5 in {{ $quantity }}
                <button type="button" style="float:right" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                        <i class="fas fa-plus-circle"></i>
                        add product
                </button>
              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Type tour</th>
                    <th>Schedule</th>
                    <th>Depart</th>
                    <th>Number people</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($tours as $p)
                      <tr>
                         <td>{{ $p->id }}</td>
                         <td>{{ $p->name }}</td>
                         <td><img style="width: 230px;height: 160px;" src="{{ $p->image }}" alt=""></td>
                         <td>{{ $p->typetour }}</td>
                         <td>{{ $p->schedule }}</td>
                         <td>{{ $p->depart }}</td>
                         <td>{{ $p->numberPeople }}</td>
                         <td>{{ $p->getPrice() }}</td>
                        </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Type tour</th>
                        <th>Schedule</th>
                        <th>Depart</th>
                        <th>Number people</th>
                        <th>Price</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
              <div class="col-sm-12 col-md-7" >
                  <div class="dataTables_paginate paging_simple_numbers"  style="float: right" id="example1_paginate">
                      <ul class="pagination">
                          <li class="paginate_button page-item previous" id="example1_previous">
                              <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                          </li>
                          @for ($i =0 ; $i < $quantity/5 ; $i++)
                          <li class="paginate_button page-item ">
                          <form action="" method="get">
                              <input type="submit" aria-controls="example1" name="page" tabindex="0" class="page-link" value="{{ $i+1 }}">
                          </form>
                        </li>
                          @endfor
                        <li class="paginate_button page-item next" id="example1_next">
                            <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="/jquery/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/datatables/jquery.dataTables.min.js"></script>
<script src="/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/js/admin.min.js"></script>
<script src="/js/demo.js"></script>

<script type="text/javascript">
    $(function () {
        $("#uploadImage").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function imageIsLoaded(e) {
        if(el=document.getElementById('img')){
            document.getElementById('preImg').removeChild(el);
        }
        var card=document.createElement('div');
        card.id='img';
        card.className='card';
        var img=document.createElement('img');
        img.className='card-img-top';
        img.src=e.target.result;
        var label=document.createElement('label');
        label.style='text-align: center';
        label.innerHTML='<i  onclick ="remove()" class="fas fa-trash text-danger">';
        card.appendChild(img);card.appendChild(label);
        $('#preImg').append(card);
        document.getElementById('image').value=img.src;
    };
    function remove(){
        document.getElementById('image').value="";
        document.getElementById('preImg').removeChild(document.getElementById('img'));
    }
 </script>
</body>
</html>
