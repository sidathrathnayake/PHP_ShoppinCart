<?php

function component($name,$preprice ,$price,$dec, $image, $id){
    $element="
            <div class='col-md-3 col-sm-6 my-3 my-md-0'>
                <form action='index.php' method='POST'>
                    <div class='card shadow'>
                        <div>
                            <img src='$image' alt='image1' class='img-fluid card-img-top'>
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <h6>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='far fa-star'></i>
                            </h6>
                            <p class='card-text'>
                                    $dec.
                            </p>
                            <h5>
                                <small><s class='text-secondary'>$$preprice</s></small>
                                <span class='price'>$$price</span>
                            </h5>
                            <button type='submit' class='btn btn-warning my-3' name='add'>Add to Cart <i class='fas fa-shopping-cart'></i></button>
                            <input type='hidden' name='id' value='$id' >
                            </div>
                    </div>
                </form>
            </div>
    
    ";

echo $element;
}

function cartData($images,$names,$price,$id){
    $element="
    <form action='cart.php?action=remove&id=$id' method='POST' class='cart-items'>
    <div class='border rounded'>
        <div class='row bg-white'>

            <div class='col-md-3 pl-0'>
                <img src=$images alt='image1' class='img-fluid'>
            </div>

            <div class='col-md-6'>
                <h5 class='pt-2'>$names</h5>
                <small class='text-secondary'>Seller: John cena</small>
                <h5 class='pt-2'>$$price</h5>
                <button type='submit' class='btn btn-warning' >Save for Later</button>
                <button type='submit' class='btn btn-danger mx-2' name='remove'>Remove</button>
            </div>
            <div class='col-md-3 py-5'>
                <div>
                    <button type='button' class='btn bg-light border rounded-circle' ><i class='fas fa-minus'></i></button>
                    <input type='text' value='1' class='form-control w-25 d-inline'>
                    <button type='button' class='btn bg-light border rounded-circle' ><i class='fas fa-plus'></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
    
    ";
echo $element;
}

