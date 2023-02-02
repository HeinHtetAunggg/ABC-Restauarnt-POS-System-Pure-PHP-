<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Home</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
<body style="background-color:lightblue;">


<div class="d-grid mb-4 d-md-flex justify-content-md-end bg-secondary" style="height: 50px;">
  <a href="Staff_Logout.php" class="btn btn-danger me-md-2 mt-1 mb-1">Log out</a>
  <hr/>
</div>



<div class="container">
  <div class="row">
    <div class="col-8">
      <h3 class="text-secondary">To Do List</h3>
  
    <form class="todoform">
        <input type="text" class="todoinput" placeholder="Enter Your Tasks" autocomplete="off">
        <ul class="todolist">
          <!-- <li>Buy Milk<i class="fa-solid fa-square-check"></i><i class="fa-solid fa-trash"></i></li>
           <li >Buy Milk<i class="fa-solid fa-square-check"></i><i class="fa-solid fa-trash"></i></li> -->
        </ul>
      </form>
    </div>
    <div class="col-4">
      <div class="card" style="width:450px;">
    <img  class="mx-auto"src="<?php echo $_SESSION['Profile'] ?>" style="width:400px;" alt="...">
    <h2 class="mx-auto ">Welcome <span class="text-primary"><?php echo $_SESSION['StaffName'] ?></span></h2>
    <h4 class="fs-5 p-2">Gmail -<b><?php echo $_SESSION['Email']?></h4>
    <h4 class="fs-5 p-2">Phone-<b><?php echo $_SESSION['Phone']?></h4>
    <h4 class="fs-5 p-2">Address-<b><?php echo $_SESSION['Address']?></h4>
    <hr class="text-dark">
    <div class="p-2">Account Created At -<b class="text-primary"><?php echo $_SESSION['Time']?> </b></div>
    <hr class="text-dark">
        <div  class="btn-group gap-3 mb-2" role="group" aria-label="Basic example">
            <a href="Purchase.php" class="btn btn-primary "> Manage Purchase</a>
            <a href="Menu_Register.php" class="btn btn-primary"> Manage Menu</a>  
            <a href="Table_Register.php" class="btn btn-primary"> Manage Tables</a>  
            <a href="EventRegister.php" class="btn btn-primary"> Manage Event</a>        
        </div>
  </div>

</div>
</div>

<script>
const todoformEl=document.querySelector(".todoform");
const todoinputEl=document.querySelector(".todoinput");
const todoulEl=document.querySelector(".todolist");
let list=JSON.parse(localStorage.getItem("list"));

list.forEach(task=>{
  toDoList(task)
})


todoformEl.addEventListener("submit",(event)=>{
     event.preventDefault();
     toDoList();
})

function toDoList(task){
    let newTask=todoinputEl.value;
    if(task){
      newTask=task.todoname
    }
    
    const liEl=document.createElement("li");
    if(task && task.checked){
      liEl.classList.add("checked");
    }
    liEl.innerText=newTask;
    todoulEl.appendChild(liEl);
    todoinputEl.value="";
    const CheckedEl=document.createElement("div");
    CheckedEl.innerHTML=`<i class="fa-solid fa-square-check"></i>`;
    liEl.appendChild(CheckedEl);
    const TrashEl=document.createElement("div");
    TrashEl.innerHTML= `<i class="fa-solid fa-trash"></i>`;
    liEl.appendChild(TrashEl);

    CheckedEl.addEventListener("click",()=>{
      liEl.classList.toggle("checked");
      updatelocalStorage()

    });

    TrashEl.addEventListener("click",()=>{
      liEl.remove(); 
      updatelocalStorage()
    })
    updatelocalStorage()
  }

 function updatelocalStorage(){
      const liEls=document.querySelectorAll("li");
      list=[];
      liEls.forEach(liEl=>{
            list.push({
              todoname: liEl.innerText,
              checked: liEl.classList.contains("checked")
            })
      })
      localStorage.setItem("list",JSON.stringify(list));
    }






</script>
      
</body>
</html>