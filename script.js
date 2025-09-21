document.addEventListener("DOMContentLoaded", function () {
  const categoryDropdown = document.getElementById('category');
  const subCategoryDropdown = document.getElementById('subCategory');

  categoryDropdown.addEventListener('change', function () {
    const categoryId = this.value;

    // Clear existing options
    subCategoryDropdown.innerHTML = '';

    if (categoryId) {
      // Send AJAX request to fetch subcategories
      fetchSubCategories(categoryId);
    }
  });

  function fetchSubCategories(categoryId) {
    // AJAX request
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const subCategories = JSON.parse(xhr.responseText);
          populateSubCategories(subCategories);
        } else {
          console.error('Error fetching subcategories');
        }
      }
    };

    xhr.open('GET', `get_subcategories.php?category=${categoryId}`, true);
    xhr.send();
  }

  function populateSubCategories(subCategories) {
    subCategories.forEach(function (subCategory) {
      const option = document.createElement('option');
      option.value = subCategory.id;
      option.textContent = subCategory.name;
      subCategoryDropdown.appendChild(option);
    });
  }
});