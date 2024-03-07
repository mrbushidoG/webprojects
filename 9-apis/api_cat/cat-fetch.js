let catArray = new Array();

function start(){
    const btnGetCatInfo = document.getElementById('btn_get_cat_info');
    btnGetCatInfo.onclick = handleButtonClick;

    loadCat();

}// end start

function loadCat(){
    const catList = document.getElementById('cat_list');

    let newOption;

    fetch('https://api.thecatapi.com/v1/breeds?api_key=live_jxdCwS3HYpqZaVSGirn3ZfXzgGPfKizluyAzXFM3OeHhH8lfOmTKQxYHqnPmlLaf')
        .then((response) => response.json())
        .then((data) => {
            data.forEach((cat) => {
                newOption = document.createElement('option');
                newOption.value = cat.name;
                newOption.text = cat.name;

                catList.appendChild(newOption);
                catArray.push(cat); //store cat data
            });
        });

        
}// end loadCat

function handleButtonClick(){
    const catList = document.getElementById('cat_list');
    const index = catList.selectedIndex;

    const cat = catArray[index];

    const outputSpan = document.getElementById('output');

    let output = `<h2>${cat.name}</h2>`;
    output += `<img src= ${cat.image.url}><br>`;
    output += `<h3>Description</h3><p>${cat.description}</p><br>`;
    output += `<a href=${cat.wikipedia_url}>${cat.name}'s Wikipedia Page</a>`;
    

    outputSpan.innerHTML = output;
}// end handleButtonClick

window.onload = start;

