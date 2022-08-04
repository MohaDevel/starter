 @extends('layouts.app')

 @section('content')
     <div class="alert alert-info"  style="display: none" id="messages_show">
         تم الحذف بنجاح
     </div>
     <div class="table-responsive">
         <div class="flex-center position-ref full-height">
             @if(Session::has('success'))

                 <div class="div alert alert-success">
                     {{Session::get('success')}}
                 </div>
             @endif

             @if(Session::has('error'))
                 <div class="div alert alert-danger">
                     {{Session::get('error')}}
                 </div>
             @endif
             <table class="table">
                 <tr>
                     <td colspan="7"><a href="{{ url('offers/create') }}" class="btn btn-info  float-right">Add</a></td></tr>
                 <thead>
                 <tr >
                     <th scope="col">#</th>
                     <th scope="col">{{__('messages.offer name_ar.key')}}</th>
                     <th scope="col">{{__('messages.offer.Price')}}</th>
                     <th scope="col">{{__('messages.offer.Details_ar')}}</th>
                     <th scope="col">Photo</th>
                     <th scope="col">{{__('messages.offer.controls')}}</th>

                 </tr>
                 </thead>



                 <tbody>
                 @foreach($offers as $offer)
                     <tr class="offerRow{{$offer->id}}">
                         <th scope="row">{{$offer -> id}}</th>
                         <td>{{$offer -> name}}</td>
                         <td>{{$offer -> price}}</td>
                         <td>{{$offer -> details}}</td>
                         <td><img height="50" width="70" src="{{asset('images/offers/'.$offer -> photo)}}" alt=""></td>
                         <td>
                             <a href="{{route('offers.delete',$offer->id)}}" class="btn btn-danger">{{__('messages.offer.Delete')}}</a>
                             <a href="{{ url('offers/edit/'.$offer->id) }}" class="btn btn-info">{{__('messages.offer.Edit')}}</a>
                              <a href="#" id="delete_btn" ede="{{ $offer->id }}" class="btn btn-info">Delete Ajax</a>
                              <a href="{{ route('ajax.offersedit',$offer->id) }}" id="edit_btn"  class="btn btn-info">Edit Ajax</a>
                         </td>
                     </tr>
                 @endforeach
                 </tbody>
             </table>

         </div>
     </div>
 @stop


 @section('scripts')
     <script>
         $(document).on('click', '#delete_btn', function (e) {
             e.preventDefault();
               let fff=$(this).attr('ede');
              $.ajax({
                 type: 'post',
                 enctype: 'multipart/form-data',
                 url: "{{route('ajax.offersdelete')}}",
                 data: {
                   'id':fff,
                     '_token': "{{csrf_token()}}",
                 },
                 success: function (data) {
                     if (data.status == true) {
                         $('#messages_show').show();
                     }
                     $('.offerRow'+data.id).remove();

                 }, error: function (reject) {
                     var response = $.parseJSON(reject.responseText);
                     $.each(response.errors, function (key, val) {
                         $("#" + key + "_error").text(val[0]);
                     });
                 }
             });
         });
     </script>
 @stop
