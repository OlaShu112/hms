<?php

$user_id = $_GET['id'];
$user_data = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`=$user_id");
if(mysqli_num_rows($user_data)===0){
exit('Patient Not Found!');
}
$data = mysqli_fetch_assoc($user_data);
$patient_data = mysqli_query($conn,"SELECT * FROM `patient` WHERE `user_id`=$user_id");
$row_data = mysqli_fetch_assoc($patient_data);
?>
<div class="max-w-4xl mx-auto">
  <h2 class="leading-7 text-gray-900 text-start text-xl md:text-3xl font-semibold mb-3">Profile</h2>
</div>
<form class="max-w-4xl mx-auto" id="dataForm" enctype="multipart/form-data">
  <div class="space-y-12">
    <div class="">
      <div class="col-span-full">
        <div class="mt-2 flex items-center gap-x-3">
          <img class="h-16 mr-3 rounded-full image_div_patient" src="<?=$url?><?php if($data['img']!==null){ echo 'assets/data/'.$data['img']; }else{ echo 'assets/data/user_image.png'; } ?>" alt="Avatar">
          <button type="button" id="upload_show"
            class="rounded-md mr-3 bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
          <a href="#"
            class="rounded-md bg-red-700 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hidden">Remove</a>
        </div>
      </div>


    </div>
  </div>
  <div class="mt-4">
    <div class="mt-3 grid grid-cols-1 gap-x-6 sm:grid-cols-6 hidden" id="upload_form">
      <div class="col-span-full mb-4">
        <label class="block text-sm font-medium leading-6 text-gray-900 mb-1" for="file_input">Upload Photo</label>
        <input
          class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
          id="file_input" name="photo" type="file">
      </div>
    </div>
  </div>

  <div class=" mt-4">
    <h2 class="text-base font-semibold leading-7 text-gray-900">More Information</h2>

    <div class="mt-3 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
      <div class="col-span-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50  hidden error_alert alert_boxes" role="alert">
      </div>
      <div class="col-span-full p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50  hidden success_alert alert_boxes"
        role="alert">
      </div>
      <input type="hidden" name="id" value="<?=$_GET['id']?>">
      <div class="col-span-full mb-4">
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full name</label>
        <div class="mt-2">
          <input type="text" name="name" id="name"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="<?=$data['name']?>" required>
        </div>
      </div>
      <div class="col-span-full mb-4">
        <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone number</label>
        <div class="mt-2">
          <input type="tel" name="phone" id="phone"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="<?=$data['phone']?>">
        </div>
      </div>

      <div class="col-span-full mb-4">
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email"  
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="<?=$data['email']?>" required>
        </div>
      </div>

      <div class="col-span-full mb-4">
        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
        <div class="mt-2">
          <input type="text" name="username" id="username"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="<?=$data['username']?>">
        </div>
      </div>
      <div class="col-span-full mb-4">
        <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
        <div class="mt-2">
          <input type="text" name="address" id="address"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="<?=$row_data['address']?>">
        </div>
      </div>
      <div class="col-span-full mb-4">
        <label for="dob" class="block text-sm font-medium leading-6 text-gray-900">Date of birth</label>
        <div class="mt-2">
          <input type="date" name="dob" id="dob"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="<?=$row_data['dob']?>">
        </div>
      </div>

      <div class="col-span-full mb-4">
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Passowrd [Leave Blank for
          same]</label>
        <div class="mt-2">
          <input type="password" name="password" id="password"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            value="">
        </div>
      </div>



    </div>
  </div>

  <div class="mt-3 flex items-center justify-end gap-x-6">
    <button type="submit"
      class="rounded-md bg-indigo-600 px-5 py-2.5 text-base font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 action_btn">Save</button>
  </div>

  <!-- </div>
        </div> -->

</form>

<script>
  $(document).ready(function () {
    $(document).on("click", "#upload_show", function () {
      $("#upload_form").toggleClass("hidden")
    });
  });
</script>
<script>
  $(document).on('submit', '#dataForm', function (e) {
    e.preventDefault();
    var formData = new FormData($("#dataForm")[0]);
    $(".action_btn").attr('disabled', true);
    $(".action_btn").text('Loading...');
    $(".action_btn").addClass('cursor-not-allowed bg-blue-400');
    $.ajax({
      method: "POST",
      url: "<?= $url ?>php/ajax/common/patient-update.php",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (res) {
        $(".action_btn").attr('disabled', false);
        $(".action_btn").removeClass('cursor-not-allowed bg-blue-400');
        $(".action_btn").text('Save');
        var data = JSON.parse(res);
        if (data.status === 'success') {
          $('.error_alert').addClass('hidden');
          $('.success_alert').removeClass('hidden');
          $('.success_alert').html(data.msg);
          if(data.img!=='a'){
$(".image_div_patient").attr('src',data.img);
          }
        } else {
          $('.success_alert').addClass('hidden');
          $('.error_alert').removeClass('hidden');
          $('.error_alert').html(data.msg);
        }

      }
    });
  });
</script>