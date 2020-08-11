import React from "react";
import { Switch, Route, Redirect } from "react-router-dom";

import Home from "./pages/Home";
import Login from "./pages/Login";
import CreateQuiz from "./pages/CreateQuiz";
import ViewQuiz from "./pages/ViewQuiz";
import EditQuiz from "./pages/EditQuiz";

import { isAuthenticated } from "./services/auth";

const PrivateRoute = ({ component: Component, ...rest }) => (
  <Route
    {...rest}
    render={(props) =>
      isAuthenticated() ? (
        <Component {...props} />
      ) : (
        <Redirect
          to={{ pathname: "/login", state: { from: props.location } }}
        />
      )
    }
  />
);

const Routes = () => {
  return (
    <Switch>
      <Route component={Home} path="/" exact />
      <Route component={Login} path="/login" />
      <Route component={CreateQuiz} path="/createQuiz" />
      <Route component={ViewQuiz} path="/viewQuiz" />
      <Route component={EditQuiz} path="/editQuiz" />
    </Switch>
  );
};

export default Routes;
