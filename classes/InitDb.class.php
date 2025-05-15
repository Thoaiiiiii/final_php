<?php 

class InitDB extends Dbhandler{
  private function CreateNeededTables() {
    $tables = array();

    array_push(
      $tables, "CREATE TABLE IF NOT EXISTS Members(
        MemberID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        Username VARCHAR(64) NOT NULL,
        Password VARCHAR(512) NOT NULL,
        Email VARCHAR(64) NOT NULL,
        PrivilegeLevel INT NOT NULL DEFAULT 0,
        Attempt INT NOT NULL,
        RegisteredDate DATE
      )"
    );

    array_push(
      $tables, "CREATE TABLE IF NOT EXISTS Orders(
        OrderID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        MemberID INT NOT NULL,
        FOREIGN KEY (MemberID) REFERENCES Members(MemberID),
        CartFlag BIT NOT NULL DEFAULT 1
      )"
    );

    array_push(
      $tables, "CREATE TABLE IF NOT EXISTS Payment(
        PaymentID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        OrderID INT NOT NULL,
        FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
        PaymentDate DATE NOT NULL
      )"
    );

    array_push(
      $tables, "CREATE TABLE IF NOT EXISTS Items(
        ItemID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        Name VARCHAR(64) NOT NULL,
        Brand VARCHAR(64) NOT NULL,
        Description VARCHAR(512) NOT NULL,
        Category INT NOT NULL,
        SellingPrice FLOAT NOT NULL,
        QuantityInStock INT NOT NULL,
        Image VARCHAR(512) NOT NULL
      )"
    );

    array_push(
      $tables, "CREATE TABLE IF NOT EXISTS OrderItems(
        OrderItemID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        OrderID INT NOT NULL,
        ItemID INT NOT NULL,
        FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
        FOREIGN KEY (ItemID) REFERENCES Items(ItemID),
        Price FLOAT NOT NULL,
        Quantity INT NOT NULL,
        AddedDatetime DATETIME NOT NULL,
        Feedback VARCHAR(512),
        Rating INT,
        RatingDateTime DATETIME
      )"
    );

    for ($i=0; $i < count($tables); $i++)
      $this->conn()->query($tables[$i]);
  }

  public function initDbExec() {
    $this->CreateNeededTables();
  }
}