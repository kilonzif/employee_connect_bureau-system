    $(document).ready(function() {
            $('#allmaids').DataTable();
        } );


    $(function(){
        // When an open tab item from your menu is clicked
        $(".open-tab").click(function(){
            // Hide any of the content tabs
            $(".tab").hide();
            // Show your active tab (read from your data attribute)
            $('[data-tab ="' + $(this).data('tab') + '"]').show();
            // Optional: Highlight the selected tab
            $('li.active').removeClass('active');
            $(this).closest('li').addClass('active');
        });
    });



function deleteMaid(id){
    if (confirm('Are you realy?')) {
        $.ajax({
            url: "admindash.php?delete=true&id="+id, 
            success: function(result){
            alert("Delete successful");
        }});
    }
}


function update(hidden,name,email,age,gender,salary,worktype,skills,experience){
     document.getElementById('hidden').value = hidden;
    document.getElementById('name').value = name;
    document.getElementById('email').value = email;
    document.getElementById('age').value = age;
    document.getElementById('gender').value =gender;
    document.getElementById('salary').value = salary;
    document.getElementById('worktype').value = worktype;
    document.getElementById('skills').value = skills;
    document.getElementById('experience').value = experience;

 }



function approve(id){

                $.ajax({
                    url: "admindash.php?approve=true&id="+id, 
                    success: function(result){
                    alert("Request Approved");
                }});
  
}

function saveChanges(id){

                $.ajax({
                    url: "admindash.php?edit=true&id="+id, 
                    success: function(result){
                    alert("Update Saved");
                }
            });
  
}
