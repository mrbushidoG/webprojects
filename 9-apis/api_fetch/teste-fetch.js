function start(){
    const btnGetData = document.getElementById("btn_get_data");
    btnGetData.onclick = getPageViewsForTopic;
}// end start function

function getPageViewsForTopic() {
    let searchTerm = document.getElementById("search_term").value;
    let outputSpan = document.getElementById("output");

    outputSpan.innerHTML = "<h2>Results for " + searchTerm + "</h2>";

    searchTerm = searchTerm.charAt(0).toUpperCase() + searchTerm.slice(1);

    console.log(searchTerm);

    fetch(`https://en.wikipedia.org/wiki/${searchTerm}`)
        .then((response) => response.json())
        .then((data) => {
            const dataArray = data.items;
            dataArray.forEach((dayData) => {
                const dateData = dayData.timestamp;
                const year = dateData.slice(0,4);
                const month = dateData.slice(4,6);
                const day = dateData.slice(6, 8);
                const dateString = `${year}-${month}-${day}`;

                //display the data
                outputSpan.innerHTML += dateString + ":&nbsp;&nbsp;"
                outputSpan.innerHTML += dayData.views + "<br>";
            });
        });
} // end getPageViewsForTopic

window.onload = start;