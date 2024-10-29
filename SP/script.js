function fetchProducts() {
    fetch('list_products.php')
    .then(response => response.json())
    .then(data => {
        const productList = document.getElementById('productList');
        productList.innerHTML = '';

        data.forEach(product => {
            const div = document.createElement('div');
            div.innerHTML = `
                <h3>${product.name}</h3>
                <p>Preço: R$ ${product.price}</p>
                <p>Descrição: ${product.description}</p>
                <button onclick="deleteProduct(${product.id})">Excluir</button>
                <button onclick="editProduct${product.id}, ${product.name}, ${product.price}, ${product.description}">Editar</button>
            `;
            productList.appendChild(div);
        });
    })

}

function deleteProduct(id) {
    if (confirm('Tem certeza que deseja excluir este produto?')) {
        fetch('delete_product.php?id=$(id)', {method: 'GET'})
        .then(() => fetchProducts());
    }
}

function editProduct(id, name, price, description) {
    document.getElementById('name').value = name;
    document.getElementById('price').value = price;
    document.getElementById('description').value = description;
    
    const form = document.getElementById('productForm');
    form.action = `edit_product.php?id=${id}`;
}

window.onload = fetchProducts;