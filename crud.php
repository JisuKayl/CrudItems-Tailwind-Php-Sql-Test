<?php require 'itemController.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD Items with PHP and MySQL</title>
    <script src="https://cdn.tailwindcss.com"></script> 
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        <h2 class="text-2xl font-semibold text-center mb-6">Simple CRUD Items with PHP and MySQL</h2>

        <form action="crud.php" method="POST" class="space-y-4">
            <input type="hidden" name="id" value="<?php echo isset($item) ? $item['id'] : ''; ?>">
            <input type="text" name="name" placeholder="Item Name" required
                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                value="<?php echo isset($item) ? $item['name'] : ''; ?>">
            <textarea name="description" placeholder="Description" required
                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"><?php echo isset($item) ? $item['description'] : ''; ?></textarea>
            <?php if (isset($item)): ?>
                <button type="submit" name="update" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Update</button>
            <?php else: ?>
                <button type="submit" name="add" class="w-full py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600">Add</button>
            <?php endif; ?>
        </form>

        <div class="mt-8 overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-700">ID</th>
                        <th class="px-4 py-2 text-left text-gray-700">Name</th>
                        <th class="px-4 py-2 text-left text-gray-700">Description</th>
                        <th class="px-4 py-2 text-left text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php 
                    if ($result->num_rows > 0):
                        while ($row = $result->fetch_assoc()): ?>
                            <tr class="border-b">
                                <td class="px-4 py-2"><?php echo $row['id']; ?></td>
                                <td class="px-4 py-2"><?php echo $row['name']; ?></td>
                                <td class="px-4 py-2"><?php echo $row['description']; ?></td>
                                <td class="px-4 py-2">
                                    <a href="crud.php?edit=<?php echo $row['id']; ?>" 
                                        class="text-blue-500 hover:text-blue-700">Edit</a> |
                                    <a href="crud.php?delete=<?php echo $row['id']; ?>" 
                                        onclick="return confirm('Are you sure?');"
                                        class="text-red-500 hover:text-red-700">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; 
                    else: ?>
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">No Data Available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
