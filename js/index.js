document.addEventListener("DOMContentLoaded", () => {
                
    const deleteButtons = document.querySelectorAll("#removeGame");
    const addButtons = document.querySelectorAll("#addGame");

    for (let deleteButton of deleteButtons) {
    
        const game = deleteButton.nextElementSibling.value;
    
        deleteButton.addEventListener("click", () => {

            const gameCard = deleteButton.parentNode.parentNode.parentNode;

            fetch("/requests/", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "request=removeGameFromOwned&game_id=" + game
            })
            .then(response => response.json())
            .then(result => {
                if (result.message === "OK") {
                    gameCard.remove();
                }
            });
        });
    }

    for (let addButton of addButtons) {
        
        addButton.addEventListener("click", () => {

            const gameId = addButton.dataset.game_id;

            fetch("/requests/", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "request=addGamesToUserList&game_id=" + gameId
            })
            .then(response => response.json())
            .then(result => {
                console.log(result);
            });
        });
    }
});