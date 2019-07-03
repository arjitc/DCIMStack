<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
<link rel="stylesheet" href="//cdn.rawgit.com/Lukas-W/font-linux/v0.7/assets/font-linux.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/css/bootstrap-select.css">
<style type="text/css">
	.bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
		width: 100%;
	}
	.btn-light {
		background-color: #fff;
		border: 1px solid #ced4da;
	}

	.table-Warning-orange{
		bg-color: #ffd589;
	}
	.table-warning-red{
		background-color: #ff9a89;
	}
	.table-warning{
		background-color: #d2f8d2;
	}

	.size {
font-size: 1.8rem;
line-height: 1.5;
}


.card-color{
	background-color: #00c0ef;
}

.card-color-lightblue{
	background-color: #44a6c6;
}

.card-top-marg{
	margin-top: 0px;
}
.card-botm-marg{
	margin-bottom: 0px;
}
.card-botm-padd{
	padding-bottom: 0px;
}

/*HoverCard */
.preview_cards
{
    position: relative;
}
.name
{
    font-weight:bold;
    position: relative;
    z-index:100; /*greater than details, to still appear in card*/
}
.details
{
    background:#fff ;
    border: 1px solid #ddd;
    position: absolute;
		min-width: 150px;
    left:-10px;
    top:-10px;
    z-index:50; /*less than name*/
    padding:2em 10px 10px; /*leave enough padding on top for the name*/
    display:none;
}
.details a
{
    text-decoration: none;
}

/* For Toggle Switch */
.tog-switch {
  margin: 4rem auto;
  > .row {
    margin-top: 2rem;
    height: 5rem;
    vertical-align: middle;
    text-align: center;
    border: 1px solid fade(@gray-lighter,50%);
    &:first-of-type {
      border:none;
      height: auto;
      text-align: left;
    }
  }
  h3 {
    font-weight: 400;
    > small {
      font-weight: 200;
      font-size: .75em;
      color: @gray-light;
    }
  }
  h6 {
    font-weight: 700;
    font-size: .65rem;
    letter-spacing: 3.32px;
    text-transform: uppercase;
    color: @gray-lighter;
    margin: 0;
    line-height:5rem;
  }
  .btn-toggle {
    top: 50%;
    transform: translateY(-50%);
  }
}



// Mixin for Switch Colors
// Variables: @color, @bg, @active-bg
.toggle-color(@color: @btn-default-color; @bg: @btn-default-bg; @active-bg: @brand-primary;) {
  color: @color;
  background: @bg;
  &:before,
  &:after {
    color: @color;
  }
  &.active {
    background-color: @active-bg;
  }
}

// Mixin for Default Switch Styles
// Variables: @size, @margin, @color, @bg, @active-bg, @font-size
.toggle-mixin(@size: @toggle-default-size; @margin: @toggle-default-label-width; @font-size: @toggle-default-font-size;) {
  // color: @color;
  // background: @bg;
  margin: 0 @margin;
  padding: 0;
  position: relative;
  border: none;
  height: @size;
  width: @size * 2;
  border-radius: @size;

  &:focus,
  &.focus {
    &,
    &.active {
      outline: none;
    }
  }

  &:before,
  &:after {
    line-height: @size;
    width: @margin;
    text-align: center;
    font-weight: 600;
    // color: @color;
    font-size: @font-size;
    text-transform: uppercase;
    letter-spacing: 2px;
    position: absolute;
    bottom: 0;
    transition: opacity .25s;
  }
  &:before {
    content: 'Off';
    left: -@margin;
  }
  &:after {
    content: 'On';
    right: -@margin;
    opacity: .5;
  }

  > .handle {
    position: absolute;
    top: (@size * .25) / 2;
    left: (@size * .25) / 2;
    width: @size * .75;
    height: @size * .75;
    border-radius: @size * .75;
    background: #fff;
    transition: left .25s;
  }
  &.active {
    transition: background-color .25s;
    > .handle {
      left: @size + ((@size * .25) / 2);
      transition: left .25s;
    }
    &:before {
      opacity: .5;
    }
    &:after {
      opacity: 1;
    }
  }

  &.btn-sm {
    &:before,
    &:after {
      line-height: @size - 2px;
      color: #fff;
      letter-spacing: .75px;
      left: @size * .275;
      width: @size * 1.55;
    }
    &:before {
      text-align: right;
    }
    &:after {
      text-align: left;
      opacity: 0;
    }
    &.active {
      &:before {
        opacity: 0;
      }
      &:after {
        opacity: 1;
      }
    }
  }

  &.btn-xs {
    &:before,
    &:after {
      display: none;
    }
  }
}



// Apply Mixin to different sizes & colors
.btn-toggle {

  .toggle-mixin;
  .toggle-color;

  &.btn-lg {
    .toggle-mixin(@size: 2.5rem; @font-size: 1rem; @margin: 5rem;);
  }

  &.btn-sm {
    .toggle-mixin(@font-size: .55rem; @margin: .5rem;);
  }

  &.btn-xs {
    .toggle-mixin(@size:1rem;@margin:0;)
  }

  &.btn-secondary {
    .toggle-color(@active-bg:@brand-secondary);
  }
}

</style>
