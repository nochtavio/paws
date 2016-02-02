<div id="main-content">

</div>
<script type="text/babel">
  var DashboardPage = React.createClass({
    render: function () {
      return (
        <div id="page-inner">
          <div className="row">
            <div className="col-md-12">
              <h2>Dashboard</h2>
              <h5>Welcome Jhon Deo , Love to see you back. </h5>
            </div>
          </div>
        </div>
      );
    }
  });

  var AdminPage = React.createClass({
    render: function () {
      return (
        <div id="page-inner">
          <div className="row">
            <div className="col-md-12">
              <h2>Admin</h2>
            </div>
          </div>
        </div>
      );
    }
  });

  var PageInner = React.createClass({
    getPage: function(){
      var page = <DashboardPage />;
      if(this.props.page == "Admin"){
        page = <AdminPage />;
      }
      return page;
    },
    render: function () {
      return (
        <div id="page-wrapper">
          {this.getPage()}
        </div>
      );
    }
  });

  var SideBar = React.createClass({
    getInitialState: function() {
      return {page: 'Dashboard'};
    },
    handleClick: function(e) {
      this.setState({
        page: e.target.name
      });
    },
    setActiveMenu: function(page){
      if(page == this.state.page){
        return 'active-menu';
      }else{
        return '';
      }
    },
    render: function () {
      return (
        <div id="content">
          <nav className="navbar-default navbar-side" role="navigation">
            <div id="sidebar" className="sidebar-collapse">
              <ul className="nav" id="main-menu">
                <li className="text-center">
                  <img src="<?php echo base_url() ?>assets/img/find_user.png" className="user-image img-responsive"/>
                </li>
                <li>
                  <a className={this.setActiveMenu("Dashboard")} href="#" name="Dashboard" onClick={this.handleClick}><i className="fa fa-dashboard fa-3x"></i> Dashboard</a>
                </li>
                <li>
                  <a className={this.setActiveMenu("Admin")} href="#" name="Admin" onClick={this.handleClick}><i className="fa fa-user fa-3x"></i> Admin</a>
                </li>
              </ul>
            </div>
          </nav>
          <PageInner page={this.state.page} />
        </div>
      );
    }
  });

  //React Render Main
  ReactDOM.render(
    <SideBar /> ,
    document.getElementById('main-content')
  );
</script>
