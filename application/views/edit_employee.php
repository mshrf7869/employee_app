<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4 py-10">

    <div class="w-full max-w-2xl bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-gray-700 mb-6">Edit Employee</h2>

        <form action="<?php echo site_url('employee/update/' . $employee->id); ?>" method="post" enctype="multipart/form-data" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="<?php echo $employee->name; ?>" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Address</label>
                <textarea name="address" required
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo $employee->address; ?></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Designation</label>
                <input type="text" name="designation" value="<?php echo $employee->designation; ?>" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Salary</label>
                <input type="number" name="salary" value="<?php echo $employee->salary; ?>" required
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Current Picture</label>
                <?php if ($employee->picture): ?>
                    <img src="<?php echo base_url('uploads/' . $employee->picture); ?>" class="w-20 h-20 rounded mt-2">
                <?php else: ?>
                    <p class="text-gray-500 mt-2">No image available.</p>
                <?php endif; ?>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Upload New Picture (optional)</label>
                <input type="file" name="picture" accept="image/*"
                       class="w-full mt-1 text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Update</button>
                <a href="<?php echo site_url('employee'); ?>"
                   class="text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>
