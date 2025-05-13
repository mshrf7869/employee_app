<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee List</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <div class="w-full max-w-6xl bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-700">Employee List</h2>
            <a href="<?php echo site_url('employee/add'); ?>" 
               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
               + Add New Employee
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 text-left">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Address</th>
                        <th class="px-4 py-2 border">Designation</th>
                        <th class="px-4 py-2 border">Salary</th>
                        <th class="px-4 py-2 border">Picture</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($employees)) : ?>
                        <?php foreach ($employees as $emp) : ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border"><?php echo $emp->id; ?></td>
                                <td class="px-4 py-2 border"><?php echo $emp->name; ?></td>
                                <td class="px-4 py-2 border"><?php echo $emp->address; ?></td>
                                <td class="px-4 py-2 border"><?php echo $emp->designation; ?></td>
                                <td class="px-4 py-2 border">₹<?php echo $emp->salary; ?></td>
                                <td class="px-4 py-2 border text-center">
                                    <?php if ($emp->picture) : ?>
                                        <img src="<?php echo base_url('uploads/' . $emp->picture); ?>" 
                                             class="w-16 h-16 object-cover rounded border">
                                    <?php else : ?>
                                        <span class="text-gray-500">No Image</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-2 border">
                                    <a href="<?php echo site_url('employee/edit/' . $emp->id); ?>" 
                                       class="text-blue-600 hover:underline">Edit</a> |
                                    <a href="<?php echo site_url('employee/delete/' . $emp->id); ?>" 
                                       onclick="return confirm('Are you sure?')" 
                                       class="text-red-600 hover:underline">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500">No employees found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
