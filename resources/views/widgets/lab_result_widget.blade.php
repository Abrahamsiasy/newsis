<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toast with Link - Primer CSS</title>
    <link href="https://unpkg.com/@primer/css@^16.0.0/dist/primer.css" rel="stylesheet" />
</head>

<body>
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

        <div class="d-flex flex-justify-end overflow-h">
            <!-- Toast -->
            <div class="Toast Toast--success">
                <span class="Toast-icon">
                    <svg width="12" height="16" viewBox="0 0 12 16" class="octicon octicon-check"
                        aria-hidden="true">
                        <path fill-rule="evenodd" d="M12 5l-8 8-4-4 1.5-1.5L4
						10l6.5-6.5L12 5z" />
                    </svg>
                </span>
                <!-- Toast containing only action -->
                <span class="Toast-content">
                    <a href="https://geeksforgeeks.org">
                        {{ $newLabResult->student->student_id }} 
                    </a>
                </span>
            </div>
        </div>
    @endforeach
</body>

</html>
