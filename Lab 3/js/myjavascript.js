const data =[
    {
        "id": 1,
        "name" : "Fighting Cats",
        "price" : 50,
        "img" : "https://media.tenor.com/37QVZBJOu6cAAAAd/cats-stan-twitter.gif",
        "alt" : "fighting cats",
        "stars": 5
    },
    {
        "id": 2,
        "name" : "Flying cat",
        "price" : 67,
        "img" : "https://i.pinimg.com/originals/a3/62/08/a36208a888dd853e3bf0dc0adcf50793.gif",
        "alt" : "flying cat",
        "stars": 5
    },
    {
        "id": 3,
        "name" : "Silly cat",
        "price" : 45,
        "img" : "https://d31iynjnzaofi5.cloudfront.net/blog/uploads/2018/11/giphy-6.gif",
        "alt" : "dumb cat",
        "stars": 4
    },
    {
        "id": 4,
        "name" : "Talking Cat",
        "price" : 150,
        "img" : "https://thumbs.gfycat.com/DampZestyFlicker-size_restricted.gif",
        "alt" : "talking cat",
        "stars": 5
    },
    {
        "id": 5,
        "name" : "Staring Cat",
        "price" : 150,
        "img" : "https://media.tenor.com/v6j3qu9ZmMIAAAAM/funny-cat.gif",
        "alt" : "staring cat",
        "stars": 3
    },
    {
        "id": 6,
        "name" : "Cups Cat",
        "price" : 10,
        "img" : "https://media1.popsugar-assets.com/files/thumbor/usddcV_YWALHmUsKGMCIln3NKZU/fit-in/1024x1024/filters:format_auto-!!-:strip_icc-!!-/2014/09/02/040/n/1922507/2ad96b638e0b7d84_giphy-6/i/Someone-explain-what-going.gif",
        "alt" : "cups cat",
        "stars": 5
    },
    {
        "id": 7,
        "name" : "Nail Cat",
        "price" : 711,
        "img" : "https://www.readersdigest.ca/wp-content/uploads/2021/03/funny-cat-gifs.gif",
        "alt" : "nail cat",
        "stars": 5
    },
    {
        "id": 8,
        "name" : "Peeking Cat",
        "price" : 5,
        "img" : "https://33.media.tumblr.com/cdf84f0701a5a56608d9989d1b75b7b6/tumblr_nq26rtQjvR1svecmko1_500.gif",
        "alt" : "talking cat",
        "stars": 1
    },
    {
        "id": 9,
        "name" : "Scratchy Cat",
        "price" : 18,
        "img" : "https://i.pinimg.com/originals/9c/91/ff/9c91ffcb3a9c9709dd726177e3cb589f.gif",
        "alt" : "scratchy cat",
        "stars": 5
    },
    {
        "id": 10,
        "name" : "Vacuum Cat",
        "price" : 42,
        "img" : "https://media.glamour.com/photos/580e1f078bd9950546d001f5/master/w_320%2Cc_limit/giphy%2520(6).gif",
        "alt" : "talking cat",
        "stars": 3
    }
    

]
const cart = [];

window.onload = function main(){ // main function
    for (let i = 0; i < data.length; i++) {
        var s = `<div class="card" onclick="javascript:popup(${data[i].id})"><center> <table><tr align="center"><td name="image"><img src="${data[i].img}" alt="${data[i].alt}"></td></tr><tr align="left"> <td>${data[i].name} - ${data[i].price}$</td></tr><tr><td><div><p id="star${i}" >${calculate_star_icons(data[i].stars)}</p></div></td></tr></table></center></div>`;
        document.getElementById("grid-container").innerHTML += s;
    }
};
function calculate_star_icons(num){
    if (num > 5){
        console.log("ERROR - number of stars out of bounds.");
        return;
    }
    var string_stars = "";

    for (let i = 0; i < num; i++) {//Adding normal stars
        string_stars += "&#9733;";
    }
    for (let i = 0; i < (5-num); i++) {//Adding empty stars
        string_stars += "&#9734;";
    }
    return string_stars;
}
function close_popup(){
    document.getElementById("popup").style.display = "none"; 
}

function find_item_by_id(id){
    for (let i = 0; i < data.length; i++) {
        if ( data[i].id == id ){
            return data[i];
        }
    }
    return null;
}

function popup(id){
    var product = find_item_by_id(id);
    if (product == null) return;
    
    document.getElementById('addCartButton').setAttribute('onclick',`add_to_cart(${product.id})`)
    document.getElementById("card_price").innerHTML = "$"+product.price; 
    document.getElementById("card_title").innerHTML = product.name; 
    document.getElementById("card_stars").innerHTML = calculate_star_icons(product.stars); 
    document.getElementById("card_img").src = product.img; 
    document.getElementById("popup").style.display = "flex"; 
}
function add_to_cart(id){
    close_popup();
    var p = find_item_by_id(id);
    if (p == null) return;
    cart.push(p);
    update_cart(cart);
}

function update_cart(cart){
    document.getElementById("cart").innerHTML = "";
    for (let i = 0; i < cart.length; i++) {
        var tag = `<div class="cart-card"><table><tr><td style="width: 80px;"><img  style="width: 80px;height: 80px;" src="${cart[i].img}" alt=""></td><td style="width: 200px;">${cart[i].name}</td><td style="width: 120px;">$${cart[i].price}</td></tr></table</div>`;
        document.getElementById("cart").innerHTML += tag;
        console.log("added" + cart[i].id);
    }
}

function close_cart(){
    document.getElementById("cart_bg").style.display = "none"; 
}
function open_cart(){
    document.getElementById("cart_bg").style.display = "flex"; 
}