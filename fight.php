<?
$root = "./";
$title = "Add New";
require './config/connect.php';
require_once "./vendor/autoload.php";
$select1    = "SELECT `id`, `name`, `type`, `power`, `created_at` FROM robots";
$robots     = mysqli_fetch_all(mysqli_query($conn, $select1), MYSQLI_ASSOC);
$select2    = "SELECT COUNT(*) totalRobots FROM robots";
$sumRobots  = mysqli_fetch_all(mysqli_query($conn, $select2));
/* 
remove the selected from original array
remove the selected from original array
*/

include_once "./app/view/html/header.php";
?>

<div class="container mt-5">
    <h2>Fight</h2>
    <div class="alert text-center mt-3" id="winner">&nbsp;</div>
    <div class="row mt-5">
        <div class="col">
            <div class="card text-bg-danger mb-3" style="width: 100%;">
            <div class="card-header" id="header_1">&nbsp;</div>
            <div class="card-body">
                <h5 class="card-title" id="title_1">&nbsp;</h5>
                <p class="card-text" id="desc_1">&nbsp;</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-warning mb-3" style="width: 100%;">
            <div class="card-header" id="header_2">&nbsp;</div>
            <div class="card-body">
                <h5 class="card-title" id="title_2">&nbsp;</h5>
                <p class="card-text" id="desc_2">&nbsp;</p>
            </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col d-flex justify-content-md-start">
            <button id="pairing" class="btn btn-sm btn-success rounded-pill px-5">Pairing</button>
        </div>
        <div class="col d-flex justify-content-center">
            <button id="fight" class="btn btn-sm btn-danger rounded-pill px-5">Fight</button>
        </div>
        <div class="col d-flex justify-content-md-end">
            <button id="next" class="btn btn-sm btn-info rounded-pill px-5">Next paring</button>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let index
        let usedIndex   = []
        let sumIndex    = []
        let robot_1, robot_2
        const robots    = <?= json_encode($robots); ?>; 
        const sumRobots = <?= json_encode($sumRobots); ?>; 
        const pairing   = document.querySelector("#pairing")
        const fight     = document.querySelector("#fight")
        const next      = document.querySelector("#next")
        /* ROBOTS */
        const header_1  = document.querySelector("#header_1")
        const title_1   = document.querySelector("#title_1")
        const desc_1    = document.querySelector("#desc_1")
        const header_2  = document.querySelector("#header_2")
        const title_2   = document.querySelector("#title_2")
        const desc_2    = document.querySelector("#desc_2")
        const winner    = document.querySelector("#winner")
        fight.disabled  = true
        next.disabled   = true
        createSumIndex()

        let maxRobots = sumRobots[0][0]
        const getRandomInt = (num) => {
            return 1 + Math.floor(Math.random() * (num - 1) )
        }

        pairing.addEventListener('click', () => {
            pairin()
        })
        fight.addEventListener('click', () => {
            desc_1.innerHTML    = robot_1.power
            desc_2.innerHTML    = robot_2.power
            if (robot_1.power > robot_2.power) {
                winner.innerHTML = `The winner is ${robot_1.name}`
                //fetchData(robot_1)
            }
            else if (robot_1.power < robot_2.power) {
                winner.innerHTML = `The winner is ${robot_2.name}`
                //fetchData(robot_2)
            }
            else                                    winner.innerHTML = "The fight is draw"
            winner.classList.add("alert-info")
            fight.disabled  = true
            next.disabled   = false
        })
        next.addEventListener('click', () => {
            header_1.innerHTML  = "&nbsp;"
            title_1.innerHTML   = "&nbsp;"
            desc_1.innerHTML    = "&nbsp;"
            header_2.innerHTML  = "&nbsp;"
            title_2.innerHTML   = "&nbsp;"
            desc_2.innerHTML    = "&nbsp;"
            winner.innerHTML    = "&nbsp;"
            winner.classList.remove("alert-info")
            pairin()
            next.disabled = true
        })

        function createSumIndex() {
            for (let i = 1; i < sumRobots; ++i) sumIndex.push(i)
        }
        async function getRndIndex(index) {
            let i = await getRandomInt(sumIndex.length)
            if (i !== index) return i
            else return i++
        }
        async function pairin() {
            /* ROBOT LEFT SIDE */
            index_1 = getRandomInt(sumIndex.length)
            robot_1 = robots[index_1]
            header_1.innerHTML  = robot_1.type
            title_1.innerHTML   = robot_1.name
            desc_1.innerHTML    = "x"
            /* ROBOT RIGHT SIDE */
            index_2 = await getRndIndex(index_1)
            robot_2 = robots[index_2]
            header_2.innerHTML  = robot_2.type
            title_2.innerHTML   = robot_2.name
            desc_2.innerHTML    = "x"
            pairing.disabled    = true
            fight.disabled      = false
        }
        async function fetchData(data) {
            const url = ""
            const response = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                }
                body: JSON.stringify(data)
                /* 
                    mode: "cors",
                    cache: "no-cache",
                    credentials: "same-origin,
                    redirect: "follow",
                    referrerPolicy: "no-referrer"
                */
            })
            return response.json()
        }

    })
</script>
<? include_once "./app/view/html/header.php" ?>
