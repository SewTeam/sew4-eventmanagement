package model;

import javax.persistence.*;
import java.util.ArrayList;

/**
 * Represents a User as it is in the Database
 *
 * @author Daniel Modliba
 * @version 2018-06-05
 */
@Entity
public class User {

    @Id
    @GeneratedValue(strategy = GenerationType.SEQUENCE)
    private long id;

    @ManyToMany
    private ArrayList<Voting> votings;

    @ManyToMany
    private ArrayList<Voteable> voteables;

    private String username;

    private String password;

    public User(ArrayList<Voting> votings, ArrayList<Voteable> voteables, String username, String password) {
        this.votings = votings;
        this.voteables = voteables;
        this.username = username;
        this.password = password;
    }

    public long getId() {
        return id;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public ArrayList<Voting> getVotings() {
        return votings;
    }

    public void setVotings(ArrayList<Voting> votings) {
        this.votings = votings;
    }

    public ArrayList<Voteable> getVoteables() {
        return voteables;
    }

    public void setVoteables(ArrayList<Voteable> voteables) {
        this.voteables = voteables;
    }
}
