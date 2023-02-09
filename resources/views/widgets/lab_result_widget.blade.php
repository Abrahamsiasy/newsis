@foreach ($newLabResults as $newLabResult)
    {{-- <script>
    
    let a = '<a>';
    let b = {{ $newLabResult->student_id }} 
    let c = '</a>';
    let d = a.concat(b,c)
    $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        body: d,
    })
</script> --}}
    <script>
        function createToast(heading = "No heading", message = "No message", id = null) {
            //Create empty variable for toasts container
            let container;
            //If container doesn't already exist create one
            if (!document.querySelector("#custom-toast-holder")) {
                container = document.createElement("div")
                container.setAttribute("id", "custom-toast-holder");
                document.body.appendChild(container);
            } else {
                // If container exists asign it to a variable
                container = document.querySelector("#custom-toast-holder");
            }

            //Create our toast HTML and pass the variables heading and message
            let toast = `<div onclick="window.open('doctor/detail/${id}','mywindow');"  class="pointer custom-single-toast custom-custom-fade-out bg-red">
              <div class="custom-toast-header">
                <div  ><span class="toast-heading">${heading}</span></div>
                <div  class="custom-close-toast">X</div>
              </div>

              <div>
                <div class="text-decoration-none custom-toast-content" >${message}</div>
                </div>

           </div>`;

            // Once our toast is created add it to the container
            // along with other toasts
            container.innerHTML += toast;


            //Save all those close buttons in one variable
            let toastsClose = container.querySelectorAll(".custom-close-toast");

            //Loop thorugh that variable
            for (let i = 0; i < toastsClose.length; i++) {
                //Add event listener
                toastsClose[i].addEventListener("click", removeToast, false);
            }

        }

        function removeToast(e) {
            //First we need to prevent default
            // to evade any unexpected behaviour
            e.preventDefault();

            //After that we add a class to our toast (.custom-single-toast)
            e.target.parentNode.parentNode.classList.add("fade-out");

            //After CSS animation is finished, remove the element
            setTimeout(function() {
                e.target.parentNode.parentNode.parentNode.removeChild(e.target.parentNode.parentNode);


                if (isEmpty("#custom-toast-holder")) {
                    console.log(isEmpty("#custom-toast-holder"));
                    document.querySelector("#custom-toast-holder").parentNode.removeChild(document.querySelector(
                        "#custom-toast-holder"));
                }
            }, 5);
        }

        function isEmpty(selector) {
            return document.querySelector(selector).innerHTML.trim().length == 0;
        }

        //document.querySelector("#custom-toast-holder").parentNode.removeChild(document.querySelector("#custom-toast-holder"));
        
        createToast("{{ $newLabResult->student->first_name }}", "{{ $newLabResult->student->student_id }}",
            "{{ $newLabResult->student->id }}");

        // container.innerHTML == "";
    </script>

    {{-- {{ $newLabResult->student->student_id }}  --}}
@endforeach
