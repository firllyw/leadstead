<x-base-layout :scrollspy="true">

    <x-slot:pageTitle>
        {{ $title }}
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        @vite(['resources/scss/light/assets/components/timeline.scss'])
        <!--  END CUSTOM STYLE FILE  -->

        <style>
            .toggle-code-snippet {
                margin-bottom: 0px;
            }

            body.dark .toggle-code-snippet {
                margin-bottom: 0px;
            }
        </style>
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    <x-slot:scrollspyConfig>
        data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100"
    </x-slot>

    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Form</a></li>
                <li class="breadcrumb-item active" aria-current="page">Basic</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->


    <div class="row layout-top-spacing">

        @include('components.alert')
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Create New Job Posting</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{route('jobs.store')}}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput2"
                                placeholder="Software Developer...." required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlSelect1">Category</label>
                            <select name="category" class="form-select" id="exampleFormControlSelect1" required>
                                <option>IT</option>
                                <option>Marketing</option>
                                <option>Operations</option>
                                <option>Sales</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        </div>
                        <input type="submit" name="time" class="mt-4 mb-4 btn btn-primary">
                    </form>
                </div>
            </div>
        </div>

    </div>


    </div>


    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>

    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
