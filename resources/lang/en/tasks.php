<?php

return [

    // Table
    'ID' => 'ID',
    'Title' => 'Title',
    'Status' => 'Status',
    'Description' => 'Description',
    'Priority' => 'Priority',
    'Created' => 'Created',
    'Updated' => 'Updated',

    // Status select options (to all)
    'notActive' => 'Not Active', // value 0
    'inProgress' => 'In Progress', // value 1
    'Completed' => 'Completed', // value 2

    // Priority select options (to all)
    'priorityLow' => 'Low', // value 0
    'priorityNormal' => 'Normal', // value 1
    'priorityHigh' => 'High', // value 2

    // Flash Messages
    'successAddTask' => 'Successfully added task',
    'successUpdateTask' => 'Successfully updated task',
    'successDeleteTask' => 'Successfully deleted task',

    //Error
    'errorStatus' => 'Error Status!',
    'errorPriority' => 'Error Priority!',

    //// View(tasks.index)
    'noneTasks' => 'There is no tasks at this moment for you!',
    'createFirstTask' => 'Create your first Task',
    'createTask' => 'Create Task',

    //// View(tasks.create)
    'titlePanelCreate' => 'Create Task',
    'addTask' => 'Create Task',

    //// View(tasks.show)
    'titlePanelShow' => 'Show Task',
    'editTask' => 'Edit Task',

    //// View(tasks.edit)
    'titlePanelEdit' => 'Edit Task',
    'updateTask' => 'Update Task',

];
