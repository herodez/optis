@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Submit</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>Submit package</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{route('upload-package')}}" method="post">
                                    @csrf
                                    <h5>Repository URL (Git)</h5>
                                    <input type="text" class="form-control" name="url" placeholder="e.g.: http://optgit.optimeconsulting.net:8090/component/optime_sso_client.git">
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <p>Please make sure you have read the package <a href="https://packagist.org/about#naming-your-package">naming conventions</a> before submitting your package. The authoritative name of your package will be taken from the composer.json file inside the master branch or trunk of your repository, and it can not be changed after that.</p>
                                <p>Do not submit forks of existing packages. If you need to test changes to a package that you forked to patch, use <a href="https://getcomposer.org/doc/05-repositories.md#vcs">VCS Repositories</a> instead. If however it is a real long-term fork you intend on maintaining feel free to submit it.</p>
                                <p>If you need help or if you have any questions please get in touch with the Composer <a href="https://getcomposer.org/doc/07-community.md">community.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection