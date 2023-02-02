<?php

   include('connect.php');
  
//    $create="CREATE TABLE Staff
   
//    (
//         StaffID int not null primary key AUTO_INCREMENT,
//         StaffName varchar(30),
//         Gender varchar(30),
//         Phone varchar(30),
//         Email varchar(30),
//         Password varchar(30),
//         Address varchar(30),
//         Profile text,
//         Time TIMESTAMP
         
//    )";

//    $query=mysqli_query($connect,$create);
//    if($query)
//    {
//     echo "<p>Staff Registration Successful</p>";
//    }


//    $create="CREATE TABLE Category
//    (
//        CategoryID int not null primary key AUTO_INCREMENT,
//        CategoryName varchar(30)
       
//    )";

//    $query=mysqli_query($connect,$create);
//    if($query)
//    {
//     echo "<p>Category Registration Sucessful</p>";
//    }

//  $update="ALTER TABLE Category
//     ADD Time Timestamp";

//   $query=mysqli_query($connect,$update);
//   if($query)
//     {
//          echo"<p>Update Successful</p>";
//     }

    // $create="CREATE TABLE FoodProduct
    // (
    //     FoodProductID int not null primary key AUTO_INCREMENT,
    //     ProductName varchar(30),
    //     CategoryID int,
    //     foreign key (CategoryID) references Category(CategoryID),
    //     Price int,
    //     Quantity int,
    //     Image text,
    //     Image2 text,
    //     Description varchar(30)
      
    // )";

    // $query=mysqli_query($connect,$create);
    // if($query)
    // {
    //     echo"<p>Food Product Registration Successful</p>";
    // }

    // $update="ALTER TABLE FoodProduct
    //          ADD Time TIMESTAMP";
    // $query=mysqli_query($connect,$update);
    // if($query)
    // {
    //     echo"<p>Update Successful</p>";
    // }


    // $create="CREATE TABLE Supplier
    // (
    //    SupplierID int not null primary key AUTO_INCREMENT,
    //    SupplierName varchar(30),
    //    Phone varchar(30),
    //    Email varchar(30),
    //    Time TIMESTAMP
    
    // )";

    // $query=mysqli_query($connect,$create);
    // if($query)
    // {
    //     echo"<p>Supplier Registration Successful</p>";
    // }

    // $create="CREATE TABLE Customer
    // (
    //   CustomerID int not null primary key AUTO_INCREMENT,
    //   Name varchar(30),
    //   Email varchar(30),
    //   Password varchar(30),
    //   Phone varchar(30),
    //   Address varchar(30),
    //   Profile text,
    //   Time TIMESTAMP
    
    // )";

    // $query=mysqli_query($connect,$create);
    // if($query)
    // {
    //     echo"<p>Customer Registration Successful</p>";
    // }


    

    // $create="CREATE TABLE Purchase
    // (
    //   PurchaseID varchar(15) not null primary key,
    //   PurchaseDate date,
    //   StaffID int,
    //   foreign key (StaffID) references Staff(StaffID),
    //   SupplierID int,  
    //   foreign key (SupplierID) references Supplier(SupplierID),
    //   TotalQuantity int,
    //   TotalAmount decimal(10,0),
    //   VAT decimal(10,0),
    //   GrandTotal decimal(10,0),
    //   Additional varchar(20),
    //   Status varchar(20)      
    // )";

    // $query=mysqli_query($connect,$create);
    // if($query)
    // {
    //     echo"<p>Successfully Created</p>";
    // }

    // $create="CREATE TABLE PurchaseDetails
    // (
    //    PurchaseID varchar(15) not null,
    //    FoodProductID int,
    //    Price int,
    //    Quantity int,
    //    Primary key (PurchaseID,FoodProductID),
    //    Foreign key(PurchaseID) REFERENCES Purchase(PurchaseID),
    //    Foreign key (FoodProductID) REFERENCES FoodProduct(FoodProductID)
    
    // )";

    // $query=mysqli_query($connect,$create);
    // if($query)
    // {
    //     echo"<p> Successfully Created</p>";
    // }


    // $create="CREATE TABLE Menu
    // (
    //      MenuID int not null primary key AUTO_INCREMENT,
    //      MenuName varchar(30),
    //      StaffID int,
    //      foreign key(StaffID) REFERENCES Staff(StaffID),
    //      CategoryID int,
    //      foreign key(CategoryID) REFERENCES MenuCategory(CategoryID),
    //      Price int,
    //      Quantity int,
    //      MenuImage1 text,
    //      MenuImage2 text,
    //      Description varchar(100),
    //      Time TIMESTAMP
    
    // )";
    // $query=mysqli_query($connect,$create);
    // if($query)
    // {
    //     echo "<p>Successfully Created</p>";
    // }


    // $create="CREATE TABLE MenuCategory
    // (
    //      CategoryID int not null primary key AUTO_INCREMENT,
    //      CategoryName varchar(30)
    
    // )";

    // $query=mysqli_query($connect,$create);
    // if($query)
    // {
    //     echo "<p>Successfully Created</p>";
    // }

    // $create="CREATE TABLE Tables
    // (
    //     TableID int not null primary key AUTO_INCREMENT,
    //     TableNumber varchar(20),
    //     Position varchar(30),
    //     StaffID int,
    //     Foreign key (StaffID) References Staff(StaffID)
    // )";
    //  $query=mysqli_query($connect,$create);
    //  if($query)
    //  {
    //     echo"<p>Successfully Created</p>";
    //  }

    // $create="CREATE TABLE Bookings
    // (
    //     BookingID varchar(30) not null primary key,
    //     TableID int,
    //     Foreign key(TableID) References Tables(TableID),
    //     CustomerID int,
    //     Foreign key(CustomerID) References Customer(CustomerID),
    //     NumberOfGuests int,
    //     ReservationTime timestamp

    
// )";
    // $query=mysqli_query($connect,$create);
    // if($query)
    // {
    //     echo"<p>Successfully Created</p>";
    // }

    // $create="CREATE TABLE SpecialEvents
    // (
    //    EventID int not null primary key AUTO_INCREMENT,
    //    EventName varchar(50),
    //    StaffID int,
    //    Foreign key (StaffID) References Staff(StaffID)
    // )";
    // $query=mysqli_query($connect,$create);
    // if($query)
    // {
    //     echo "<p>Successfully Created</p>";
    // }

    // $create="CREATE TABLE SpecialContact
    // (
    //     SpecialID varchar(30) not null primary key,
    //     CustomerID int,
    //     Foreign key (CustomerID) References Customer(CustomerID),
    //     EventID int,
    //     Foreign key (EventID) References SpecialEvents(EventID),
    //     Email varchar(30),
    //     Phone varchar(30),
    //     EventDate Date,
    //     EventTime Time,
    //     Guest int,
    //     Additional varchar(100)
    // )";
    // $query=mysqli_query($connect,$create);
    // if($query)
    // {
    //     echo"<p>Successfully Created</p>";
    // }

    // $create="CREATE TABLE Orders
    // (
    //    OrderID varchar(30) not null primary key,
    //    OrderDate date,
    //    CustomerID int,
    //    Foreign key (CustomerID) References Customer(CustomerID),
    //    CustomerName varchar(30),
    //    TotalQuantity int,
    //    TotalAmount decimal(10,0),
    //    VAT decimal(10,0),
    //    GrandTotal decimal(10,0),
    //    DeliveryType varchar(30),
    //    Phone varchar(30),
    //    Address varchar(100),
    //    PaymentType varchar(30),
    //    CardNumber varchar(30)
    
    // )";

    // $query=mysqli_query($connect,$create);
    // if($query)
    // {
    //     echo"<p>Successfully Created</p>";
    // }

    // $create="CREATE TABLE OrderDetails
    // (
    //    OrderID varchar(30),
    //    Foreign key (OrderID) References Orders(OrderID),
    //    MenuID int,
    //    Foreign key(MenuID) References Menu(MenuID),
    //    Price decimal(10,0),
    //    Quantity int
    // )";

    // $query=mysqli_query($connect,$create);
    // if($query)
    // {
    //     echo"<p>Successfully Created</p>";
    // };




?>