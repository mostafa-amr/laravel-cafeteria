let product =document.querySelector(".selected");
// console.log(products);
let ifExist=[];
let finalPrice=0;
// initial quantity to 0
products.forEach(product => {
  product.quantity = 1; 
  product.totalPrice=product.price;
});
// console.log("🚀 ~ file: index.js:8 ~ products:", products)


product.addEventListener("click", function(e){
    // console.log(e.target);
    
   let conatiner =document.querySelector(".tableBody");
   let clickedItemWraper=e.target.closest("div");
//    console.log("🚀 ~ file: index.js:5 ~ product.addEventListener ~ clickedItemWraper:", clickedItemWraper.dataset.itemId);
for(let i=0;i<products.length;i++){
    if(products[i].id==clickedItemWraper.dataset.itemId&&!ifExist.includes(products[i].id)){
        ifExist.push(products[i].id)
        conatiner.innerHTML+= `<tr id="row${products[i].id}">
        <input type="text" name="productID[]" value="${products[i].id}" readonly hidden>
        <th>${products[i].name}</th>
        <td id="total${products[i].id}">${products[i].totalPrice}</td>
        <td class="d-flex align-items-center justify-content-center">
        <input id="add${products[i].id}" type="button" value="+" class="add btn btn-danger mx-1" onclick="Add(this)" />
          <input type="button" value="-"id="min${products[i].id}" class="min btn btn-info mx-1" onclick="Min(this)" />
        </td>
        <td id="quantity${products[i].id}">${products[i].quantity}</td>
        <td><input type="button" value="x" class="deleteProduct btn btn-danger" onclick="deleteProduct(this,${products[i].id})" /></td>
        <input id="totall${products[i].id}" type="text" name="quantity[]" value="${products[i].quantity}" readonly hidden>
        </tr>`
 
      finalPrice+=products[i].price;
      document.getElementById("finalPrice").textContent=finalPrice;
    }
}
   

    })



function deleteProduct(e,id){
    let row=e.parentElement.parentElement;
    let arrIndex=parseInt(row.id.slice(3));
    products[products.findIndex(obj => obj.id === arrIndex)].quantity=1;
    finalPrice-=products[products.findIndex(obj => obj.id === arrIndex)].totalPrice;
    document.getElementById("finalPrice").textContent=finalPrice;
    products[products.findIndex(obj => obj.id === arrIndex)].totalPrice=products[products.findIndex(obj => obj.id === arrIndex)].price;
   
    // console.log(products[products.findIndex(obj => obj.id === arrIndex)].quantity);
    // console.log("🚀 ~ file: index.js:8 ~ products:", products);
    // console.log(ifExist.indexOf(arrIndex));
    ifExist.splice(ifExist.indexOf(arrIndex),1);
    row.remove();
    // console.log(arrIndex);
    // products[products.indexOf(arrIndex)].price=1;
    //remove item from post array
    var productID = document.getElementsByName('productID[]');
    var quantityArray = document.getElementsByName('quantity[]');
    for (var i = 0; i < productID.length; i++) {
      if (productID[i].value == id) {
        productID[i].remove();
        quantityArray[i].remove();
        break; 
      }
    }
}





function Add(e){
  let arrIndex=parseInt(e.id.slice(3));
  
  for(let i=0;i<products.length;i++){
   
    // console.log(products[i].id);
    // console.log(arrIndex);
    if(products[i].id==arrIndex&&products[i].quantity<products[i].stock){
      
      products[i].quantity++;
      let price=0;
      price=products[i].price;
      price *= products[i].quantity;
      products[i].totalPrice=price;
      // console.log("arrIndex");
      // console.log("🚀 ~ file: index.js:8 ~ products:", products)
      finalPrice+=products[i].price;
      updateDisplay(products[i].id,products[i].quantity,products[i].totalPrice)
    
    }
}
document.getElementById("finalPrice").textContent=finalPrice;


}


function Min(e){
  let arrIndex=parseInt(e.id.slice(3));
  for(let i=0;i<products.length;i++){
    // console.log(products[i].id);
    // console.log(arrIndex);
    if(products[i].id==arrIndex&&products[i].quantity>1){
      
      products[i].quantity--;
      let price=0;
      price=products[i].price;
      price *= products[i].quantity;
      products[i].totalPrice=price;
      // console.log("arrIndex");
      // console.log("🚀 ~ file: index.js:8 ~ products:", products)
      finalPrice-=products[i].price;
      updateDisplay(products[i].id,products[i].quantity,products[i].totalPrice)
    }
}
document.getElementById("finalPrice").textContent=finalPrice;
}



function updateDisplay(id,quantity,money) {
document.getElementById(`total${id}`).textContent=money;
document.getElementById(`quantity${id}`).textContent=quantity;
document.getElementById(`totall${id}`).value=quantity;
}