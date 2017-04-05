@extends('layouts.app')

@section('content')
    <section class="featured-post">
        

        @for ($i = 0; $i < 3; $i++)

            <div class="large-post">        
                <div class="parallax-container">
                    <div class="section">
                        <div class="container">
                            <h1 class="header center">News Title Goes Here</h1>
                        </div>
                    </div>
                    <div class="parallax"><img src="http://lorempixel.com/1600/900" alt="Unsplashed background img 1"></div>
                </div>
                <div class="content container">
                    <div class="row center">
                        <p class="wrap">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta vitae recusandae, culpa, architecto quas velit temporibus nemo autem quia beatae dolores repellat maxime facere nostrum eveniet nulla eos assumenda repellendus voluptatem iure similique sed! Nisi reiciendis numquam iste quo eius atque voluptate nam veniam omnis! Dolorem non dignissimos ullam commodi ipsa voluptatum dolores animi sit eligendi velit, rem quas ratione. Vel excepturi optio, praesentium quasi earum error eaque ducimus reprehenderit quae inventore non, vero! Veniam animi ipsam facere quidem, debitis autem neque consequuntur in nulla fugiat pariatur distinctio, deserunt, id, saepe aut? Blanditiis, harum! Facere, alias molestias quam consectetur necessitatibus porro. Mollitia architecto incidunt sequi, aliquam sint quia ad sapiente tenetur rem. Assumenda labore in fugit voluptate cumque voluptatibus tempore eum tempora, nam aperiam. Voluptatum odit asperiores dolores animi maiores cupiditate est eaque, eveniet voluptates vitae in ducimus, sit quae veritatis minus. Dolore magni, maiores iure perspiciatis ducimus tempore quae provident architecto, nemo, numquam recusandae optio quisquam accusamus! Sed qui, deleniti beatae sint aspernatur nulla saepe. Explicabo expedita voluptatibus sint amet quas eum nemo neque. Necessitatibus pariatur error laboriosam sit iure consequatur amet maiores itaque. Iure distinctio eum doloribus repellat. Animi ipsam accusamus numquam quidem voluptatibus ducimus rem ratione voluptate libero nesciunt quis odio, nemo eveniet vitae aliquid similique qui provident sed, ea cum. Inventore voluptates nam ullam a blanditiis laborum molestias minima exercitationem quasi velit, adipisci, iusto possimus perspiciatis aperiam quos explicabo. Dolore quidem quos qui perferendis assumenda aliquam expedita veniam corporis maxime, nisi possimus explicabo deserunt ex, itaque ipsam architecto impedit quo dolor delectus, cumque veritatis provident amet eius sapiente. Explicabo numquam voluptatibus cupiditate, dolores saepe delectus modi, repellat, architecto molestias quae earum! Illum aliquid consectetur facere, a esse sapiente ad veniam harum tempora sint. Accusamus, quod, deserunt fugit sint aliquam quisquam quia aperiam, amet repellendus non laboriosam?</p>
                    </div>
                    <div class="row center btn-row">
                        <a href="#" class="btn waves-effect waves-light teal lighten-1">View All</a>
                    </div>
                </div>
                <div class="ads container">
                    <div class="card">
                        <div class="card-content">
                            <h1>Nice and Clean Ads</h1>
                        </div>
                    </div>
                </div>
            </div>

        @endfor
    </section>

    <section class="related container">
        <h3>Related Posts</h3>
        <div class="row">
            <div class="col s12 m9">
                <ul>
                    @for($i=0; $i < 4; $i++)
                        <li class="row small-post">
                            <div class="col s4 img-div">
                                <img src="http://lorempixel.com/400/200" alt="">
                            </div>
                            <div class="col s8">
                                <h4>News Title Goes Here</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda debitis esse praesentium cupiditate corporis quaerat autem minus tempora, molestiae, non placeat aliquam commodi qui, voluptatem.</p>
                                <a href="#" class="right">Read More</a>
                            </div>
                        </li>
                    @endfor
                </ul>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-content">
                        <p>Nice and Clean Ads</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <h4>Related Posts</h4>
                        <ul>
                            <li><a href="#">Related News Title</a></li>
                            <li><a href="#">Related News Title</a></li>
                            <li><a href="#">Related News Title</a></li>
                            <li><a href="#">Related News Title</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <p>Nice and Clean Ads</p>
                    </div>
                </div>
            </div>
        </div>        
    </section>
    
@stop