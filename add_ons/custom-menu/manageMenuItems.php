<?php
/**
 * Add / Amend menu items
 */

$path = $dir = dirname(__DIR__, 2). "/config.php";
include ($path);
$tngUrl = $tngdomain;
/********************************************** */ 
$jsonFilePath = __DIR__ . '/topmenu-json1.json';

// Initialize variables
$menuItems = [];
$success = "";

// Read the JSON file
if (file_exists($jsonFilePath)) {
    $menuItems = json_decode(file_get_contents($jsonFilePath), true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        die("Error decoding JSON: " . json_last_error_msg());
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Update_Paths'])) {
    if (isset($_POST['menuItems']) && is_array($_POST['menuItems'])) {
        foreach ($_POST['menuItems'] as $index => $item) {
            // Ensure all visibility keys are set
            $_POST['menuItems'][$index]['visAll'] = isset($item['visAll']) ? 1 : 0;
            $_POST['menuItems'][$index]['visAdmin'] = isset($item['visAdmin']) ? 1 : 0;
            $_POST['menuItems'][$index]['visLoggedIn'] = isset($item['visLoggedIn']) ? 1 : 0;

            if (isset($item['subitems']) && is_array($item['subitems'])) {
                foreach ($item['subitems'] as $subIndex => $subItem) {
                    $_POST['menuItems'][$index]['subitems'][$subIndex]['visAll'] = isset($subItem['visAll']) ? 1 : 0;
                    $_POST['menuItems'][$index]['subitems'][$subIndex]['visAdmin'] = isset($subItem['visAdmin']) ? 1 : 0;
                    $_POST['menuItems'][$index]['subitems'][$subIndex]['visLoggedIn'] = isset($subItem['visLoggedIn']) ? 1 : 0;
                }
            }
        }

        $menuItems['items'] = $_POST['menuItems'];
        file_put_contents($jsonFilePath, json_encode($menuItems, JSON_PRETTY_PRINT));
        $success = "Menu items updated successfully!";
    }
}
?>
<style>
.menuItem {
    color:blue;
    font-size: 14px;
}
</style>::after

<form class="form-group" action="" method="post">
    <div>
        <h3>Edit Menu Items</h3>
        <?php foreach ($menuItems['items'] as $index => $item): ?>
            <fieldset style="margin-bottom: 15px; padding: 10px; border: 1px solid #ccc;">
                <legend class="menuItem">Menu Item <?php echo $index + 1; ?></legend>
                <label for="name_<?php echo $index; ?>">Name:</label>
                <input type="text" name="menuItems[<?php echo $index; ?>][name]" id="name_<?php echo $index; ?>" value="<?php echo htmlspecialchars($item['name']); ?>" required>
                <br>
                <label for="url_<?php echo $index; ?>">URL:</label>
                <input type="text" name="menuItems[<?php echo $index; ?>][url]" id="url_<?php echo $index; ?>" value="<?php echo htmlspecialchars($item['url']); ?>" required>
                <br>
                <label for="visAll_<?php echo $index; ?>">Visible to All:</label>
                <input type="checkbox" name="menuItems[<?php echo $index; ?>][visAll]" id="visAll_<?php echo $index; ?>" value="1" <?php echo $item['visAll'] ? 'checked' : ''; ?>>
                <br>
                <label for="visAdmin_<?php echo $index; ?>">Visible to Admin:</label>
                <input type="checkbox" name="menuItems[<?php echo $index; ?>][visAdmin]" id="visAdmin_<?php echo $index; ?>" value="1" <?php echo $item['visAdmin'] ? 'checked' : ''; ?>>
                <br>
                <label for="visLoggedIn_<?php echo $index; ?>">Visible to Logged-In Users:</label>
                <input type="checkbox" name="menuItems[<?php echo $index; ?>][visLoggedIn]" id="visLoggedIn_<?php echo $index; ?>" value="1" <?php echo $item['visLoggedIn'] ? 'checked' : ''; ?>>
                <br>
                <h4>Subitems</h4>
                <?php foreach ($item['subitems'] as $subIndex => $subItem): ?>
                    <fieldset style="margin-bottom: 10px; padding: 5px; border: 1px dashed #aaa;">
                        <legend>Subitem <?php echo $subIndex + 1; ?></legend>
                        <label for="subname_<?php echo $index; ?>_<?php echo $subIndex; ?>">Name:</label>
                        <input type="text" name="menuItems[<?php echo $index; ?>][subitems][<?php echo $subIndex; ?>][name]" id="subname_<?php echo $index; ?>_<?php echo $subIndex; ?>" value="<?php echo htmlspecialchars($subItem['name']); ?>" required>
                        <br>
                        <label for="suburl_<?php echo $index; ?>_<?php echo $subIndex; ?>">URL:</label>
                        <input type="text" name="menuItems[<?php echo $index; ?>][subitems][<?php echo $subIndex; ?>][url]" id="suburl_<?php echo $index; ?>_<?php echo $subIndex; ?>" value="<?php echo htmlspecialchars($subItem['url']); ?>" required>
                        <br>
                        <label for="subvisAll_<?php echo $index; ?>_<?php echo $subIndex; ?>">Visible to All:</label>
                        <input type="checkbox" name="menuItems[<?php echo $index; ?>][subitems][<?php echo $subIndex; ?>][visAll]" id="subvisAll_<?php echo $index; ?>_<?php echo $subIndex; ?>" value="1" <?php echo $subItem['visAll'] ? 'checked' : ''; ?>>
                        <br>
                        <label for="subvisAdmin_<?php echo $index; ?>_<?php echo $subIndex; ?>">Visible to Admin:</label>
                        <input type="checkbox" name="menuItems[<?php echo $index; ?>][subitems][<?php echo $subIndex; ?>][visAdmin]" id="subvisAdmin_<?php echo $index; ?>_<?php echo $subIndex; ?>" value="1" <?php echo $subItem['visAdmin'] ? 'checked' : ''; ?>>
                        <br>
                        <label for="subvisLoggedIn_<?php echo $index; ?>_<?php echo $subIndex; ?>">Visible to Logged-In Users:</label>
                        <input type="checkbox" name="menuItems[<?php echo $index; ?>][subitems][<?php echo $subIndex; ?>][visLoggedIn]" id="subvisLoggedIn_<?php echo $index; ?>_<?php echo $subIndex; ?>" value="1" <?php echo $subItem['visLoggedIn'] ? 'checked' : ''; ?>>
               <?php var_dump($item['url']); ?>
					</fieldset>
					
                <?php endforeach; ?>
            </fieldset>
        <?php endforeach; ?>
    </div>
    <p style="color: green; display: inline-block"><?php echo "<b>" . $success . "</b><br />"; ?></p>
    <p>
        <input type="submit" name="Update_Paths" value="Update Paths">
    </p>
</form>
