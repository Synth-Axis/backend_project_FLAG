document.addEventListener("DOMContentLoaded", () => {
                
    if (window.location.href.includes("userlibrary")) {
        const deleteButtons = document.querySelectorAll("#removeGame");
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
                .then(response => response.json()).then(result => {
                    if (result.message === "OK") {
                        gameCard.remove();
                        let gamesCounter = parseInt(document.querySelector("#gameCounter").textContent);
                        gamesCounter = gamesCounter - 1;
                        document.querySelector("#gameCounter").textContent = gamesCounter;
                        console.log(gamesCounter);
                    }
                });
            });
        }
    }

    if (window.location.href.includes("gamedetail")) {
        const addButton = document.querySelector("#addGame");
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
                const p = document.createElement("p");
                document.querySelector("#innerContainer").appendChild(p).textContent = result.message;
                let gamesCounter = parseInt(document.querySelector("#gameCounter").textContent);
                gamesCounter = gamesCounter + 1;
                document.querySelector("#gameCounter").textContent = gamesCounter;
            });
        });
    }

    if (window.location.href.includes("admin_db_games")) {
        const removeButtons = document.querySelectorAll('#deleteGame');

        for (let removeButton of removeButtons) {
            const game = removeButton.nextElementSibling.value;

            removeButton.addEventListener("click", () => {

                gameLine = removeButton.parentNode.parentNode.parentNode;

                fetch("/requests/", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "request=deleteGame&game_id=" + game
                })
                .then(response => response.json()).then(result => {
                    if (result.message === "OK") {
                        gameLine.remove();
                    }
                });
            });
        }
    }
});


    
