@extends('frontend.layouts.app')
@push('custom-css')
<style>
    .card{
        font-size: 16px;
    }
    #cart_show input{
        width: 28px;
        text-align: center;
        border: 1px solid #cd9f9f;
    }
    #cart_show img{
        max-height: 50px;
    }

</style>
@endpush
@section('page_conent')
    <div class="main-content-wrapper home-page">
        <div class="wrapper-container p-top-15">
            <div class="card text-center">
                <div class="card-header">
                    <h1>Your all selected products</h1>
                </div>
                <div class="card-body" id="cart_show">
                    
                   
                </div>
            </div>


        </div>
    </div>
@endsection

@push('custom-js')
    <script>
        var d = document;
      let card_body = document.getElementById("cart_show");
      let cart_product = JSON.parse(localStorage.getItem('product_storage'));
      let appends = `<div class="row mb-2">
                        <div class="col-3">
                            <span>Image</span>
                        </div>
                        <div class="col-3">
                             <span>Price</span>
                         </div>
                        <div class="col-3 ps-4 text-start">
                           Qty 
                        </div>
                        <div class="col-3">
                           <span>Total</span>
                         </div>
                    </div>`;
      for(let item in cart_product){
         appends += `<div class="row mb-2 ">
                        <div class="col-3">
                           <img src="${cart_product[item].img}" alt="">
                        </div>
                        <div class="col-3 m-auto">
                             <span class='price${item}'>${cart_product[item].dis_price}</span>৳
                         </div>
                        <div class="col-3 m-auto">
                            <div class="input-group">
                                <button class="btn btn-sm btn-outline-primary plus-btn" id='${item}' type="button">+</button>
                                <input type="number" value="1" step="1">
                                <button class="btn btn-sm btn-outline-danger minus-btn" id='${item}' type="button">-</button>
                              </div>
                        </div>
                        <div class="col-3 m-auto">
                           <span class="total-price${item}">850</span>৳
                         </div>
                    </div>`;
                  
           
      }
      card_body.innerHTML = appends;
        let plus_btn = document.querySelectorAll('.plus-btn'); 
        let minus_btn = document.querySelectorAll('.minus-btn'); 
        
      increment(plus_btn);
      decrement(minus_btn);

      function increment(element){
        element.forEach(item =>{
            item.addEventListener('click',function(event){
                if(Number(this.nextElementSibling.value)>4){
                    alert("You can't select more than 5 product")
                }else{
                    let id = this.getAttribute('id');
                    let price = Number(d.querySelector(`.price${id}`).textContent);
                    let total_priceE = d.querySelector(`.total-price${id}`);
                    let qty = Number(this.nextElementSibling.value) +1;
                    this.nextElementSibling.value =  qty ;
                    let total_price = price * qty;
                    total_priceE.textContent = total_price;
                    
                }
            });
        });
      }
      function decrement(element){
        element.forEach(item =>{
            item.addEventListener('click',function(event){
                if(Number(this.previousElementSibling.value)<2){
                    alert("You have to select at least one product")
                }else{
                    let id = this.getAttribute('id');
                    let price = Number(d.querySelector(`.price${id}`).textContent);
                    let total_priceE = d.querySelector(`.total-price${id}`);
                    let qty = Number(this.previousElementSibling.value) - 1;
                    this.previousElementSibling.value = qty  ;

                    let total_price = price * qty;
                    total_priceE.textContent = total_price;
                }
            });
        })
      }
    </script>
@endpush
