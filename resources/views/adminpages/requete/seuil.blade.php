@extends('admin')
@section('content')
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                
                  
                    <div class="col-sm-6">
                      
                      <div class="mb-3">
                          <a href="{{route('stock.liststock')}}" class="btn btn-primary waves-effect waves-left btn-sm">Revenir à la recherche <i class="mdi mdi-arrow-left ms-1"></i></a>
  
                      </div>
                    </div>
   
                    <div class="col-sm-6">
                               
                      <div class="mb-3">
                          
                          <a href="{{route('stock.imprimeSeuil')}}" class="btn btn-outline-info waves-effect waves-light btn-sm"><i class="bx bx-printer"></i>Imprimer
                          </a>
  
                      </div>
                    </div>
                </div>
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                    
                @endif
                @if (session()->has('succesdanger'))
                <div class="alert alert-danger">
                    {{session()->get('succesdanger')}}
                </div>
                @endif
               <br>
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité disponible</th>
                        <th>Quantité alert</th>
                        <th>Quantité seuil</th>
                        <th>Action</th>
                        
                    </tr>
                    </thead>

                    <tbody>

                        @foreach ($stocks as $item)
                            <tr>

                                <td>{{retreiveNomProduit($item->produit_id)}}</td>
                                <td>{{$item->quantité}}</td>                                
                                <td>{{$item->quantiteAlert}}</td>                                
                                <td>{{$item->quantiteSeuil}}</td>                                
                                <td>
                                    <a href="{{route('fournisseur.indexCommande')}}" class="btn btn-warning waves-light waves-effect">Commander ce produit</a>
                                    
                                </td>                               
                                                           
                               
                                
                            </tr>
                        @endforeach                    
   
                    </tbody>
                </table>
                <div style="text-align: center;">
                    <nav aria-label="...">
                            <ul class="pagination">
                              <li class="page-item">
                                <a class="page-link" href="{{$stocks->previousPageUrl()}}">Pr&eacute;c&eacute;dent</a>
                           
                              </li>
                              <li class="page-item">
                                <a class="page-link" href="{{$stocks->nextPageUrl()}}">Suivant</a>
                              </li>
                            </ul>
                          </nav>  
                </div>
                 
            </div>
        </div>
    </div> <!-- end col -->
  </div> <!-- end row -->  
@endsection