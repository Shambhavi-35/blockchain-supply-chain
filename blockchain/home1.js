function login() {
  let username = prompt("Enter your username:");
  if (username) {
    alert("Welcome, " + username + "!");
  }
}

function searchProduct() {
  const input = document.getElementById("searchInput").value.toLowerCase();
  const productList = document.querySelectorAll(".product");
  let found = false;

  productList.forEach((item) => {
    const text = item.textContent.toLowerCase();
    if (text.includes(input)) {
      item.style.backgroundColor = "#d1ffd1";
      found = true;
    } else {
      item.style.backgroundColor = "#fff";
    }
  });

  const resultDiv = document.getElementById("searchResult");
  resultDiv.innerHTML = found
    ? `<p style="padding: 10px; color: green;">Found matching product(s)!</p>`
    : `<p style="padding: 10px; color: red;">No matching product found.</p>`;
}
