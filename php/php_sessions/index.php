<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Zach Robinson CIS241</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css" >
    </head>

    <body>
        <h1 class="text-center">Small Cafe</h1>
        <div class="row">
            <div class="col-md-4 offset-md-3">
                <form action="set_sessions.php" method="post">

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Zach Robinson" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@domain.com" required />
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Order Type:</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="orderType" id="type1" value="dine in" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Dine In
                                </label>
                                </div>

                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="orderType" id="type2" value="carry out">
                                <label class="form-check-label" for="gridRadios2">
                                    Carry Out
                                </label>
                                </div>

                                <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="orderType" id="type3" value="delivery" >
                                <label class="form-check-label" for="gridRadios3">
                                    Delivery
                                </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <div class="col-sm-2">Order Items</div>

                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="item1" name="orderItems[]" value="coffee">
                                <label class="form-check-label" for="item1">
                                    Coffee
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="item2" name="orderItems[]" value="cherry turnover">
                                <label class="form-check-label" for="item2">
                                    Cherry Turnover
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="item3" name="orderItems[]" value="sandwich">
                                <label class="form-check-label" for="item3">
                                    Sandwich
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>