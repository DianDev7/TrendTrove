<?php
session_start();

// Check if a page is clicked and set the PageView variable accordingly
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'Mens':
            $_SESSION['PageView'] = 1;
            $conn = new Database();
            $sql = "SELECT header, price, img_path FROM products WHERE img_path LIKE '%/men%'";
            $conn->query($sql);
            $result = $conn->resultSet();

            break;
        case 'Womens':
            $_SESSION['PageView'] = 2;
            $conn = new Database();
            $sql = "SELECT header, price, img_path FROM products WHERE img_path LIKE '%/women%'";
            $conn->query($sql);
            $result = $conn->resultSet();
            break;
        case 'Kids':
            $_SESSION['PageView'] = 3;
            $conn = new Database();
            $sql = "SELECT header, price, img_path FROM products WHERE img_path LIKE '%kids%'";
            $conn->query($sql);
            $result = $conn->resultSet();
            break;
        case 'Beauty':
            $_SESSION['PageView'] = 4;
            $conn = new Database();
            $sql = "SELECT header, price, img_path FROM products WHERE img_path LIKE '%beauty%'";
            $conn->query($sql);
            $result = $conn->resultSet();
            break;
        default:
            $_SESSION['PageView'] = 0;
            break;
    }
}

?>

<script>
    function onLoadFunction() {

        var container = document.getElementById("MainContainer");
        var items = <?php echo json_encode($result); ?>;

        // Loop through the items array

        if (items) {
            for (var i = 0; i < items.length; i++) {

                // Create a new Div for each item
                var itemDiv = document.createElement("div");
                itemDiv.classList.add("box");
                itemDiv.classList.add("mensbox");

                // Image
                var itemImage = document.createElement("img");
                itemImage.src = items[i].img_path;

                // Header
                var itemHeader = document.createElement("h4");
                itemHeader.textContent = items[i].header;

                // Price
                var itemPrice = document.createElement("p");
                itemPrice.textContent = items[i].price;

                // ADD Buttons
                var addToCartBtn = document.createElement("button");
                addToCartBtn.classList.add("add-to-cart");
                addToCartBtn.textContent = "Add to Cart";


                // Attach event listener to the "Add to Cart" button
                addToCartBtn.addEventListener("click", (function(item) {
                    return function() {
                        // Retrieve item data
                        var itemHeader = item.header;
                        var itemPrice = item.price;
                        var itemImagePath = item.img_path;
                        
                        // Create item object
                        var selectedItem = {
                            header: itemHeader,
                            price: itemPrice,
                            img_path: itemImagePath
                        };
                        
                        // Store the selected item in a global array
                        var cartItems = JSON.parse(sessionStorage.getItem("cartItems")) || [];
                        cartItems.push(selectedItem);
                        sessionStorage.setItem("cartItems", JSON.stringify(cartItems));
                         alert ("Product Added!");  
                    };

                })(items[i]));

                // Create Inner Div
                var itemInnerDiv = document.createElement("div");
                itemInnerDiv.classList.add("cart");

                // Create Icon
                var icon = document.createElement("i");
                icon.classList.add("bx");
                icon.classList.add("bx-cart");

                // Append the elements to the container
                container.appendChild(itemDiv);
                itemDiv.appendChild(itemImage);
                itemDiv.appendChild(itemHeader);
                itemDiv.appendChild(itemPrice);
                itemDiv.appendChild(addToCartBtn);
                itemDiv.appendChild(itemInnerDiv);
                itemInnerDiv.appendChild(icon);
            }
        }
    }
    window.onload = onLoadFunction;
</script>

<?php
class Database
{
    protected $user = "diantnyn_dian";
    protected $password = "adz7ct3j6bpl";
    protected $host = "diantest.co.za";
    protected $dbname = "diantnyn_dianthirdyeariteca";
    
    public $dbh;
    public $stmt;
    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host .  ';dbname=' . $this->dbname . ';';
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($param, $value)
    {
        $this->stmt->bindValue($param, $value);
    }

    public function execute()
    {
        try {
            return $this->stmt->execute();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }
    public function close()
    {
        $pdo = null;
        $this->stmt = null;
    }
}
?>