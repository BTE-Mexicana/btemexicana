document.getElementById("searchBar").addEventListener("input", function(){
    const searchQuery = this.value.toLowerCase();
    const products = document.querySelectorAll(".producto");
    products.forEach(product => {
        const productName = product.getAttribute("data-name").toLowerCase();
        if (productName.includes(searchQuery)){
            product.style.display = "inline-block";
        } else{
            product.style.display = "none";
            removeHighlight(product);
        }
    });
});
function highlightMatch(productElement, searchTerm){
    const productName = productElement.textContent;
    const startIndex = productName.toLowerCase().indexOF(searchTerm.toLowerCase());
    if(startIndex !== -1){
        const highlightText = productName.substring(0, startIndex) + "<span class='highlight'>" + productName.substring(startIndex, startIndex + searchTerm.Lenght) + "</span>";
        productElement.innerHTML = highlightedText;
    }
}
function removeHighlight(productElement){
    const productName = productElement.getAttribute("data-name");
    productElement.innerHTML = productName;
}