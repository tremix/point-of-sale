@extends('layout')

@section('content')
   <div class="col-md-12">
      <div class="row">
         <div class="panel panel-default">
            <div class="panel-heading">
               @include('customers._menu')
               <h3 class="panel-title"><i class="fi-page-multiple"></i> Customers</h3>
            </div>
            <div class="panel-body">
               @include('customers._filter')

               <table class="table condence">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th class="col-md-3">Customer Name</th>
                        <th class="col-md-3">Address</th>
                        <th class="col-md-3">Contact</th>
                        <th class="col-md-3"></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($customers as $key => $customer)
                     <tr>
                        <td>{{ $index+$key }}</td>
                        <td>{{ Mualnuam\TextUtility::highlightString(array_key_exists('name', $input)?$input['name']:null, $customer->name) }}</td>
                        <td>{{ Mualnuam\TextUtility::highlightString(array_key_exists('address', $input)?$input['address']:null, $customer->address) }}</td>
                        <td>{{ Mualnuam\TextUtility::highlightString(array_key_exists('contact', $input)?$input['contact']:null, $customer->contact) }}</td>
                        <td class="actions">
                           <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-primary"><i class="fi-pencil"></i> Edit</a>
                           {{ Form::open(['url' => route('customers.destroy', $customer->id), 'method' => 'delete']) }}
                              {{ Form::button('<i class="fi-trash"></i> Delete', ['class' => 'btn btn-sm btn-danger', 'type' => 'submit']) }}
                           {{ Form::close() }}
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>

               {{ $customers->links() }}
            </div>
         </div>
      </div>
   </div>
@stop
